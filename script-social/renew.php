<?php
	include_once("scriptTwitter.php");

	$words = array('ebola', 'peste', 'chiasse');

	foreach($words as $key => $word)
	{
		file_put_contents(''.$word.'.json', getTwitterFeed($word));
	}
?>