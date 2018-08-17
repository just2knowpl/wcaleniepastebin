<?
$api_key = "369739eaae04eaafbe89293926f096fbbbd20b5b";
$user = "Rushi";

$str = file_get_contents('https://osu.ppy.sh/api/get_user?u='.$user.'&k='.$api_key);
$json = json_decode($str, true);

echo '<pre>' . print_r($json, true) . '</pre>';
?>
