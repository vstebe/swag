<?php
	// url twitter #ebola
	//https://api.twitter.com/1.1/search/tweets.json?q=%23ebola&tweetarrayult_type=recent
	//Twitter OAuth Settings

	include('TwitterAPIExchange.php');

	// $word = 'nuitinfo';

	function getTwitterFeed($word)
	{

		$settings = array(
	    'oauth_access_token' => "376073486-e0ysup2rLJvlln82GWtX9sFeieKzP7NyMzJ8GeMn",
	    'oauth_access_token_secret' => "U1nHDCMxyyYCsaHw7YPWU0FmWFN7s8XROhvTbM4nN5gZE",
	    'consumer_key' => "Ay3OyUk10DKX89rxisAUIHz86",
	    'consumer_secret' => "AzAWsgrAfYYjp0JQKoxbSwkO5jZ36Da5AJXznIf6fcDLohffLs"
		);

		$url = 'https://api.twitter.com/1.1/search/tweets.json';
		$getfield = '?q=%23'.$word;
		$requestMethod = 'GET';

		$twitter = new TwitterAPIExchange($settings);
		$tweetarray = $twitter->setGetfield($getfield)
		             ->buildOauth($url, $requestMethod)
		             ->performRequest();
		$tweetarray = json_decode($tweetarray);
		$res = array();


		for($i = 0; $i < count($tweetarray->statuses) ; $i++)
		{
			$res[$i] = array("text" => $tweetarray->statuses[$i]->text,
							 "time" =>$tweetarray->statuses[$i]->created_at,
							 "author" =>$tweetarray->statuses[$i]->user->screen_name,
							 "retweet" =>$tweetarray->statuses[$i]->retweet_count,
							 "link" =>'https://twitter.com/'.$tweetarray->statuses[$i]->user->screen_name.'/status/'.$tweetarray->statuses[$i]->id);
		}

		$res_json = json_encode($res);
		return $res_json;
	}
	












	/*
	$data = array('a','b','c');

	header('Content-Type: application/json');
	echo json_encode($tweetarrayponse);
	*/
?>