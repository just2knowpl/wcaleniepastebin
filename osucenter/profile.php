<?php
include 'functions.php';
$api_key = "369739eaae04eaafbe89293926f096fbbbd20b5b";
$user = "Rushi";

$str = file_get_contents('https://osu.ppy.sh/api/get_user?u='.$user.'&k='.$api_key);
$best_plays = file_get_contents('https://osu.ppy.sh/api/get_user_best?u='.$user.'&k='.$api_key);
$json = json_decode($str, true);
$json_best_plays = json_decode($best_plays, true);


foreach($json_best_plays as $test) {
    echo $test['pp']." ";
}

    
?>
