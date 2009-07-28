<?php
global $wgSitename;
$messages = array();
 
$messages['en'] = array( 
	  'newwikibuilder' => 'New Wiki Builder',
	  "nwb-choose-a-file" => "Please choose a file",
	  "nwb-error-saving-description" => "Error Saving Description",
	  "nwb-error-saving-theme" => "Error Saving Theme",
	  "nwb-error-saving-articles" => "Error Saving Articles",
	  "nwb-error-saving-logo" => "Error Uploading Logo",
	  "nwb-saving-articles" => "Saving Articles...",
	  "nwb-articles-saved" => "Articles Saved",
	  "nwb-theme-saved" => "Theme Choice Saved",
	  "nwb-saving-description" => "Saving Description...",
	  "nwb-description-saved" => "Description Saved",
	  "nwb-uploading-logo" => "Uploading Logo...",
	  "nwb-logo-uploaded" => "Logo Uploaded",
	  "nwb-login-successful" => "Login Successful",
	  "nwb-logout-successful" => "Logout Successful",
	  "nwb-login-error" => "Error logging in",
	  "nwb-logging-in" => "Logging in...",
	  "nwb-api-error" => "There was a problem: ",
	  "nwb-no-more-pages" => "No more pages can be created",
	  "nwb-must-be-logged-in" => "You must be logged in for this action",
	  "nwb-skip-this-step" => "Skip this step",
	  "nwb-coming-soon" => "Coming Soon",
	  "nwb-unable-to-edit-description" => "The description is uneditable with New Wiki Builder",
	  "nwb-step1-headline" => "Describe your wiki",
	  "nwb-step1-text" => "<p>Let's start setting up <b>". $wgSitename ."</b>. You can skip any step and come back to it later on.</p><p>First: Write a message for the front page of your wiki that describes what Wiki Name is about.</p>",
	  "nwb-step1-example" => "<b>Example</b><br />Muppet Wiki is an encyclopedia about everything related to Jim Henson, The Muppet Show and Sesame Street. The wiki format allows anyone to create or edit any article, so we can all work together to create a comprehensive database for fans of the Muppets.",
	  "nwb-step2-headline" => "Upload a logo",
	  "nwb-step2-text" => "<p>Next: Choose a logo for <b>". $wgSitename ."</b>.</p><p>Upload a picture from your computer to represent your wiki.</p><p>You can skip this step if you don't have a picture that you want to use right now.</p>",
	  "nwb-step2-example" => "This would be a good logo for a skateboarding wiki.",
	  "nwb-step3-headline" => "Pick a theme",
	  "nwb-step3-text" => "<p>Now choose a color scheme for <b>". $wgSitename ."</b>.</p><p>You can change this later on if you change your mind.</p>",
	  "nwb-step4-headline" => "Create pages",
	  "nwb-step4-text" => "<p>What do you want to write about?</p><p>Make a list of some pages you want to have on your wiki.</p>",
	  "nwb-step4-example" => "<b>Example</b><p>For a Monster Movie Wiki, your first pages would be: <ul class=\"bullets\"><li>Dracula</li><li>Frankenstein's Monster</li><li>The Wolfman</li><li>The Mummy</li></ul></p><p>For a Board Games Wiki: <ul class=\"bullets\"><li>Monopoly</li><li>Risk</li><li>Scrabble</li><li>Trivial Pursuit</li></ul></p>",
	  "nwb-step5-headline" => "What's Next?",
	  "nwb-step5-text" => "<p>That's all the steps! <b>". $wgSitename ."</b> is ready to go.</p><p>Now it's time to start writing and adding some pictures, to give people something to read when they find your wiki.</p><p>The list of pages that you made in the last step has been added to a \"Coming Soon\" box on the main page. You can get started by clicking on those pages. Have fun!</p>",
	  "nwb-preview" => "Preview",
	  "nwb-logo-preview" => "Logo preview",
	  "nwb-choose-logo" => "Choose logo",
	  "nwb-save-description" => "Save Description",
	  "nwb-save-theme" => "Save Theme",
	  "nwb-create-pages" => "Create Pages",
	  "nwb-save-logo" => "Save Logo",
	  "nwb-go-to-your-wiki" => "Go to your wiki",
	  "nwb-back-to-step-1" => "Back to step 1",
	  "nwb-back-to-step-2" => "Back to step 2",
	  "nwb-back-to-step-3" => "Back to step 3",
	  "nwb-back-to-step-4" => "Back to step 4"
);

// Note that this variable is referenced in the NewWikiBuilder.html.php file
global $NWBmessages;
$NWBmessages = $messages;
