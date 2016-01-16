<pre><?php /*var_dump($contents); */?></pre>

<div class="wrapper">
	<h1>Questions Fréquentes</h1>

	<div class='questions'>
	<dl>
	<?php
	foreach($contents as $question) {
	?>
		<dt><?php echo $question['question']; ?></dt>
		<dd><?php echo nl2br($question['reponse']); ?></dd></br></br>
	<?php
	}
	?>
	</dl>
	</div>
</div>
