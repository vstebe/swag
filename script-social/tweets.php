<?php
	include_once("scriptTwitter.php");
	if(isset($_GET['word']))
	{
		print(getTwitterFeed($_GET['word']));
	}
	else
	{
		echo "error";
	}
?>