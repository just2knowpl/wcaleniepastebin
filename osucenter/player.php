<!DOCTYPE html>

<head>
    <title>Patisony gotowane</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body id="players">
    <?php
if(!empty($_GET['nick'])) {
    

$api_key = "369739eaae04eaafbe89293926f096fbbbd20b5b";
$user = $_GET['nick'];

$str = file_get_contents('https://osu.ppy.sh/api/get_user?u='.$user.'&k='.$api_key);
$best_plays = file_get_contents('https://osu.ppy.sh/api/get_user_best?u='.$user.'&k='.$api_key);
$json = json_decode($str, true);
$json_best_plays = json_decode($best_plays, true);
$recent = file_get_contents('https://osu.ppy.sh/api/get_user_recent?u='.$user.'&k='.$api_key);
$json_recent = json_decode($recent, true);

    if($json) {
        $nickname = $json[0]['username'];
        $playerId = $json[0]['user_id'];
        $pp = $json[0]['pp_raw'];
        $totalPoints = $json[0]['total_score'];
        $rankedPoints = $json[0]['ranked_score'];
        $lvl = round($json[0]['level'],2);
        $lvl_arr = explode('.',$lvl);
        //$lvl_arr[0];  // Before the Decimal point
        //$lvl_arr[1];  // After the Decimal point
        $acc = round($json[0]['accuracy'],2);
        $ss_rank = $json[0]['count_rank_ss'];
        $ssh_rank = $json[0]['count_rank_ssh'];
        $s_rank = $json[0]['count_rank_s'];
        $sh_rank = $json[0]['count_rank_sh'];
        $a_rank = $json[0]['count_rank_a'];
        $country = $json[0]['country'];
        $country_rank = $json[0]['pp_country_rank'];
        $global_rank = $json[0]['pp_rank'];
        $pos = 1; //zmienna pomocnicza;
        
        
        
        echo "
        <div class='playerBox'>
        <img src='https://a.ppy.sh/".$playerId."' alt='".$nickname."' class='rounded-0 avatar'>
        <h1 class='nick'>".$nickname."(#".$global_rank.")</h1>
        <h2>".$country."(#".$country_rank.")</h2>
        <div class='rank_icons'>
        <img src='img/SSH.png' alt='SSH' class='rank_ico'>
        <img src='img/SS.png' alt='SS' class='rank_ico'>
        <img src='img/SH.png' alt='SH' class='rank_ico'>
        <img src='img/S.png' alt='S' class='rank_ico'>
        <img src='img/A.png' alt='A' class='rank_ico'></div>
        <div class='rank_count'>1 2 3 4 5</div>
        <div class='progress'>
        <div class='progress-bar progress-bar-striped bg-warning' role='progressbar' style='width: ".$lvl_arr[1]."%' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100'><div>".$lvl_arr[0]." LVL</div></div>
        </div>
        </div>
        </div>
        <div>PP: ".$pp."</div>
        <div>Accuracy: ".$acc."</div>
        <div>Total points: ".$totalPoints."</div>
        <div>Ranked points: ".$rankedPoints."</div>
        <div>SS+: ".$ssh_rank."</div>
        <div>SS: ".$ss_rank."</div>
        <div>S+: ".$sh_rank."</div>
        <div>S: ".$ss_rank."</div>
        <div>A: ".$a_rank."</div>
        <h2>Top 10 plays:</h2> 
        ";
        //===========best_score=============
        for($i=0;$i<count($json_best_plays);$i++) {
            $b_id = $json_best_plays[$i]['beatmap_id'];
            $song_checker = file_get_contents('https://osu.ppy.sh//api/get_beatmaps?&k='.$api_key.'&b='.$b_id);
            $json_song_checker = json_decode($song_checker, true);
            echo "<h3>Top ". $pos ."</h3>";
            echo "<h3>Song name: ". $json_song_checker[0]['title'] ."</h3>";
            echo "<h3>Created by: ". $json_song_checker[0]['creator'] ."</h3>";
            echo "<p>Score: ".$json_best_plays[$i]['score']."</p>";
            echo "<p>Combo: ".$json_best_plays[$i]['maxcombo']."</p>";
            if($json_best_plays[$i]['perfect'] == 1) {
                echo "<p>FC"."</p>";
            }
            //TODO: sprawdzanie w bazie danych. Odciążenie requestów. Jeżeli dana beatmapa nie istnieje w bazie, trzeba ją dodać wraz z potrzebnymi informacjami, w przeciwnym wypadku ma pobrać informacje z bazy. 
            echo "<p>Rank: ".$json_best_plays[$i]['rank']."</p>";
            echo "<p>Star ratting: ".round($json_song_checker[0]['difficultyrating'],1)."</p>";
            echo "<p>PP: ".$json_best_plays[$i]['pp']."</p>";
            echo "<p>CS: ".$json_song_checker[0]['diff_size']." ";
            echo "OD: ".$json_song_checker[0]['diff_overall']." ";
            echo "AR: ".$json_song_checker[0]['diff_approach']." ";
            echo "HP: ".$json_song_checker[0]['diff_drain']." ";
            echo "BPM: ".$json_song_checker[0]['bpm']."</p>";
            $pos++;
        }
        unset($pos);
        
        echo count ($json_best_plays);
        echo "<h2>10 most recent plays over the last 24 hours</h2>";
        for($i=0;$i<count($json_recent);$i++) {
            $map_id = $json_recent[$i]['beatmap_id'];
             echo "
            <p>beatmap name:</p>
            <p>artist:</p>
            <p>maxcombo:</p>
            <p>300: 100: 50: miss:</p>
            <p>rank:</p>
            <p>mods:</p>
            ";
            if($json_recent[$i]['perfect'] == 1) {
                echo "<p>fc</p>";
            }
        }
       
        
    }

    else {
        echo "user nie istnieje";
    }

}
?>

</body>

</html>
