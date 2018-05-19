<?php

//Authorize access
require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$consumer_key = "efNal1EAZ357xAk7w3oqNU8B3";
$consumer_secret = "6IvBpYztT6p7zrM3bLvEyMxgVBOwMjmlHasXi0tjfUsg69hr9Z";
$access_token = "894280437089976320-6f5gbN4PBzTibDooyDDSCtu54PlO6gX";
$access_token_secret = "b6I7zoIsTMyrnURXrkNpOKc30o92BgXn8vixza77d9cWd";

$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");

//ACCESSING INFO
echo "<h1>View page source</h1>";

//get my user info, location and other profile details
print_r($content);

echo "<br /><br />";

//get all the statuses in your time line
//args are got from  GET https://api.twitter.com/1.1/"statuses/home_timeline".json?"count=25"&"exclude_replies=true"
$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

//posts tweet in my time line
//args : POST https://api.twitter.com/1.1/"statuses/update".json?"status=hello%20world"
//$statues = $connection->post("statuses/update", ["status" => "hello world"]);

print_r($statuses);

?>
