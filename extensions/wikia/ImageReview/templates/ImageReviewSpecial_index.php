<style>
	#ImageReviewForm table {
		margin: 20px 0;
	}
	
	#ImageReviewForm label {
		border: solid 1px #ccc;
		display: block;
	}

	#ImageReviewForm img {
		display: block;
		max-height: 230px;
		max-width: 230px;
	}

	#ImageReviewForm a {
		float: right;
	}
</style>

<?php
	var_dump($imageList);
?>

<form action="<?= $submitUrl ?>/submit" method="post" id="ImageReviewForm">
	<table width=="980" cellspacing="5">
		<colspan>
			<col width="245">
			<col width="245">
			<col width="245">
			<col width="245">
		</colspan>

<?php
	for ($n=0; $n<5; $n++) {
?>
		<tr>
			<td>
				<label>
					<img src="http://images4.wikia.nocookie.net/__spotlights/images/0654911ff943af82aa614c6a44ded605.png">
					<input type="checkbox" value="1">
					<small><a href="#" target="_blank">link</a></small>
				</label>
			</td>
			<td>
				<label>
					<img src="http://images4.wikia.nocookie.net/__spotlights/images/0654911ff943af82aa614c6a44ded605.png">
					<input type="checkbox" value="2">
					<small><a href="#" target="_blank">link</a></small>
				</label>
			</td>
			<td>
				<label>
					<img src="http://images4.wikia.nocookie.net/__spotlights/images/0654911ff943af82aa614c6a44ded605.png">
					<input type="checkbox" value="3">
					<small><a href="#" target="_blank">link</a></small>
				</label>
			</td>
			<td>
				<label>
					<img src="http://images4.wikia.nocookie.net/__spotlights/images/0654911ff943af82aa614c6a44ded605.png">
					<input type="checkbox" value="4">
					<small><a href="#" target="_blank">link</a></small>
				</label>
			</td>
		</tr>
<?php
	}
?>
	</table>

	<input type="submit" value="Review and get next batch &raquo;" />
</form>