<?php

/**
 * CodeLint
 *
 * Generic class providing interface for jslint.js library using nodejs
 *
 * @author Maciej Brencz (Macbre) <macbre at wikia-inc.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @package MediaWiki
 */

abstract class CodeLint {

	// file name pattern - used when linting directories
	protected $filePattern = null;

	/**
	 * Check whether nodejs is installed
	 *
	 * @return boolean is nodejs installed
	 */
	static public function isNodeJsInstalled() {
		return !is_null(`which node`);
	}

	/**
	 * Get nodejs is version
	 *
	 * @return string nodejs version
	 */
	static public function getNodeJsVersion() {
		return trim(`node --version`);
	}

	/**
	 * Return an instance of given type of lint class
	 *
	 * @param string $mode type of lint class
	 * @return CodeLint lint class instance
	 */
	public static function factory($mode) {
		$className = 'CodeLint' . ucfirst($mode);

		// fallback to default report format
		if (!class_exists($className)) {
			throw new Exception("{$className} doesn't exist!");
		}

		return new $className();
	}

	/**
	 * Find files matching a pattern using PHP "glob" function and recursion
	 *
	 * @see http://www.redips.net/php/find-files-with-php/
	 *
	 * @return array containing all pattern-matched files
	 *
	 * @param string $dir     - directory to start with
	 * @param string $pattern - pattern to glob for
	 */
	protected function findFiles($dir, $pattern) {
		// escape any character in a string that might be used to trick
		// a shell command into executing arbitrary commands
		$dir = escapeshellcmd($dir);
		// get a list of all matching files in the current directory
		$files = glob("$dir/$pattern");
		// find a list of all directories in the current directory
		// directories beginning with a dot are also included
		foreach (glob("$dir/{.[^.]*,*}", GLOB_BRACE|GLOB_ONLYDIR) as $sub_dir) {
		    $arr   = $this->findFiles($sub_dir, $pattern);  // resursive call
		    $files = array_merge($files, $arr); // merge array with files from subdirectory
		}
		// return all found files
	    return $files;
	}

	/**
	 * Run given JS file using nodejs
	 *
	 * @param string $scriptName file to run
	 * @param array $params parameters to pass to nodejs
	 * @return string output from nodejs
	 */
	protected function runUsingNodeJs($scriptName, $params = array()) {
		$timeStart = microtime(true /* $get_as_float */);

		$scriptName = escapeshellcmd($scriptName);

		// format parameters
		$extraParams = '';
		foreach($params as $key => $value) {
			$extraParams .= " --{$key}=" . escapeshellcmd(trim($value));
		}

		$cmd = "node {$scriptName}{$extraParams}";
		exec($cmd, $output, $retVal);
		$output = implode("\n", $output);

		wfDebug(__METHOD__ . ": {$cmd} returned #{$retVal} code\n");

		$timeEnd = microtime(true /* $get_as_float */);

		if ($retVal == 0) {
			// decode JSON encoded response from the script
			$res = json_decode($output, true /* $assoc */);

			if (!empty($res)) {
				$res['time'] = round($timeEnd - $timeStart, 4);
			}
		}
		else {
			throw new Exception($output);
		}

		return $res;
	}

	/**
	 * Check whether given directory / name matches any blacklist entry
	 *
	 * @param string $entry name to check against blacklist entries
	 * @param array $blacklist blacklist entries
	 * @return boolean is entry blacklisted
	 */
	protected function isBlacklisted($entry, $blacklist) {
		if (!empty($blacklist) && is_array($blacklist)) {
			foreach($blacklist as $item) {
				if (strpos($entry, $item) !== false) {
					return true;
				}
			}
		}

		return false;
	}

	/**
	 * Filter out message we don't really want in the report
	 *
	 * @param array $error error entry reported by jslint
	 * @return boolean returns true if the entry should be kept
	 */
	abstract public function filterErrorsOut($error);

	/**
	 * Simplify error report to match the generic format
	 *
	 * @param array $entry single entry from error report
	 * @return array modified entry (it should contain 'error' and 'line' keys and an optional 'isImportant' key)
	 */
	abstract public function internalFormatReportEntry($entry);

	/**
	 * Perform lint on a file and return list of errors
	 *
	 * @param string $fileName file to be checked
	 * @return array list of reported warnings
	 */
	abstract public function internalCheckFile($fileName);

	/**
	 * Decide whether given error is important and should be eventaully marked in the report
	 *
	 * @param string $errorMsg error message
	 * @return boolean is it an important error
	 */
	abstract protected function isImportantError($errorMsg);

	/**
	 * Check given file and return list of warnings
	 *
	 * @param string $fileName file to be checked
	 * @return array list of reported warnings
	 */
	public function checkFile($fileName) {
		$output = $this->internalCheckFile($fileName);

		// cleanup the list of errors reported
		if (!empty($output['errors'])) {
			$output['errors'] = array_filter($output['errors'], array($this, 'filterErrorsOut'));
			$output['errors'] = array_values($output['errors']);

			// keep the original number of errors
			$output['errorsCount'] = count($output['errors']);

			// simplify the report and fold multiple occurances of the same error
			$errorsFolded = array();

			foreach($output['errors'] as $entry) {
				$entry = $this->internalFormatReportEntry($entry);

				if (!isset($errorsFolded[ $entry['error'] ])) {
					$errorsFolded[ $entry['error'] ] = array();
				}

				$errorsFolded[ $entry['error'] ][] = $entry['line'];
			}

			$output['errors'] = array();

			foreach($errorsFolded as $msg => $lines) {
				$entry = array(
					'error' => $msg,
					'lines' => $lines,
				);

				// mark important errors
				if ($this->isImportantError($msg)) {
					$entry['isImportant'] = true;
				}

				$output['errors'][] = $entry;
			}
		}
		else {
			$output['errorsCount'] = 0;
		}

		return $output;
	}

	/**
	 * Check given list of files and return list of warnings
	 *
	 * @param string $fileNames files to be checked
	 * @param array $blacklist list of patterns to match against directories
	 * @return array list of reported warnings
	 */
	public function checkFiles($fileNames, $blacklist = array()) {
		$results = array();

		foreach($fileNames as $fileName) {
			if (!$this->isBlacklisted($fileName, $blacklist)) {
				$results[] = $this->checkFile($fileName);
			}
		}

		return $results;
	}

	/**
	 * Check all files in a given directory recursively
	 *
	 * @param string $directoryName directory to be checked
	 * @param array $blacklist list of patterns to match against files in directory / subdirectories
	 * @return array list of reported warnings
	 */
	public function checkDirectory($directoryName, $blacklist = array()) {
		global $wgCommandLineMode;

		$files = $this->findFiles(rtrim($directoryName, '/'), $this->filePattern);
		$results = array();

		// blacklist minified versions
		$blacklist[] = '.min.';
		$blacklist[] = '-min.';

		if (!empty($files)) {
			foreach($files as $fileName) {
				// skip blacklisted ones
				if ($this->isBlacklisted($fileName, $blacklist)) {
					if (!empty($wgCommandLineMode)) {
						echo "Linting {$fileName}... [skipped]\n";
					}
					continue;
				}

				if (!empty($wgCommandLineMode)) {
					echo "Linting {$fileName}...";
				}

				$results[] = $this->checkFile($fileName);

				if (!empty($wgCommandLineMode)) {
					echo " [done]\n";
				}
			}
		}

		return $results;
	}

	/**
	 * Check given list of directories and return list of warnings
	 *
	 * @param string $directoryNames directories to be checked
	 * @param array $blacklist list of patterns to match against directories
	 * @return array list of reported warnings
	 */
	public function checkDirectories($directoryNames, $blacklist = array()) {
		$results = array();

		foreach($directoryNames as $directoryName) {
			if (!$this->isBlacklisted($directoryName, $blacklist)) {
				$results += $this->checkDirectory($directoryName, $blacklist);
			}
		}

		return $results;
	}

	/**
	 * Generate report from given results
	 *
	 * @param array $results results returned by checkFile / checkDirectory method
	 * @param string $format report format
	 * @return string report
	 */
	public function formatReport($results, $format = 'text') {
		$report = CodeLintReport::factory($format);

		return $report->render($results);
	}
}