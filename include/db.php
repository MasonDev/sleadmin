<?php
	$db = new MySQL();
	
	if (! $db->Open("sle", "localhost", "root", "")) {
		$db->Kill();
	}
?>