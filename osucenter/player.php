<?php
include 'functions.php';
include 'functions/general_functions.php';
?>
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
$best_plays = file_get_contents('https://osu.ppy.sh/api/get_user_best?u='.$user.'&limit=10&k='.$api_key);
$json = json_decode($str, true);
$json_best_plays = json_decode($best_plays, true);
$recent = file_get_contents('https://osu.ppy.sh/api/get_user_recent?u='.$user.'&k='.$api_key);
$json_recent = json_decode($recent, true);

    if($json) {
        foreach($json as $playerInfo) {
        $nickname = $playerInfo['username'];
        $playerId = $playerInfo['user_id'];
        $pp = number_format(round($playerInfo['pp_raw'],0));
        $totalPoints = number_format($playerInfo['total_score']);
        $rankedPoints = number_format($playerInfo['ranked_score']);
        $count300 = number_format(300 * $playerInfo['count300']);
        $count100 = number_format(100 * $playerInfo['count100']);
        $count50 = number_format(50 * $playerInfo['count50']);
        $lvl = round($playerInfo['level'],2);
        $lvl_arr = explode('.',$lvl);
        //$lvl_arr;  // Before the Decimal point
        //$lvl_arr[1];  // After the Decimal point
        $acc = round($playerInfo['accuracy'],2);
        $ss_rank = number_format($playerInfo['count_rank_ss']);
        $ssh_rank = number_format($playerInfo['count_rank_ssh']);
        $s_rank = number_format($playerInfo['count_rank_s']);
        $sh_rank = number_format($playerInfo['count_rank_sh']);
        $a_rank = number_format($playerInfo['count_rank_a']);
        $country = country($playerInfo['country']);
        $country_rank = number_format($playerInfo['pp_country_rank']);
        $global_rank = number_format($playerInfo['pp_rank']);
        $pos = 1; //zmienna pomocnicza;
        }
        

        echo "
        <div class='playerBox'>
        <img src='https://a.ppy.sh/".$playerId."' alt='".$nickname."' class='rounded-0 avatar'>
        <div class='poziom1'>
        <table class='nick'>
        <tr><th>
        <h1 class='nickname'>".$nickname."(#".$global_rank.")</h1>
        </th></tr>
        <tr><th>
        <h2 class='rank_coutry'>".$country."(#".$country_rank.")</h2>
        </th></tr></table>
        <div class='player_lvl'>".$lvl_arr[0]."</div>
        <table class='ppacc'>
        <tr>
        <th>
        <div class='pp'>".$pp."pp</div>
        </th></tr>
        <tr><th>
        <div class='acc'>".$acc."% acc</div>
        </th></tr>
        </table>
        </div>
        <div class='poziom1'>
        <div class='ranks'>
        <table class='ranksTable'>
        <tr>
        <div class='rank_icons'>
        <th><img src='img/SSH.png' alt='SSH' class='rank_ico'></th>
        <th><img src='img/SS.png' alt='SS' class='rank_ico'></th>
        <th><img src='img/SH.png' alt='SH' class='rank_ico'></th>
        <th><img src='img/S.png' alt='S' class='rank_ico'></th>
        <th><img src='img/A.png' alt='A' class='rank_ico'></th></div>
        </tr>
        <tr>
        <div class='rank_count'>
        <th><div>".$ssh_rank."</div></th>
        <th><div>".$ss_rank."</div></th>
        <th><div>".$sh_rank."</div></th>
        <th><div>".$ss_rank."</div></th>
        <th><div>".$a_rank."</div></th>
        </tr>
        </table></div>
        <div class='scores'>
        <table class='valuescr'>
        <tr>
        <th><div>Ranked score: ".$rankedPoints."</div></th>
        </tr>
        <tr>
        <th><div class=''><span class='hit300'>".$count300."</span><span class='separator'>/</span><span class='hit100'>".$count100."</span><span class='separator'>/</span><span class='hit50'>".$count50."</span></th>
        </tr>
        </table>
        </div>
        </div>
  
        </div>
        </div>
        </div>
        
        
        

        
        
        
        
        
        <div class='pls'>
        ";
        //===========best_score=============
        //for($i=0;$i<count($json_best_plays);$i++) 
        foreach($json_best_plays as $player_best){
            $b_id = $player_best['beatmap_id'];
            $song_checker = file_get_contents('https://osu.ppy.sh/api/get_beatmaps?&k='.$api_key.'&b='.$b_id);
            $json_song_checker = json_decode($song_checker, true);
            $bset_id = $json_song_checker[0]['beatmapset_id'];
            $mapCover = "https://assets.ppy.sh/beatmaps/".$bset_id."/covers/cover.jpg";
            echo "<div class='topSongs' style='background-image: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.7)), url(".$mapCover.");'>";
            echo "<div class='poziom2'>";
//            echo "<h3>#". $pos ."</h3>";
            echo "<table class='bestSong_table'>";
            echo "<tr>";
            echo "<th><h3 class='title'>". $json_song_checker[0]['title'] ."</h3>";
            echo "</th></tr><tr>";
            echo "<th><h3 class='artist'>". $json_song_checker[0]['artist'] ."</h3>";
            echo "</th></tr>";
            echo "</table>";
            echo "<table> <tr>";
            echo "<th><div class='pp2'>".round($player_best['pp'],2)."pp</div></th></tr>";
            echo "<tr><th class='acc2'>".accCalc($player_best['count300'],$player_best['count100'],$player_best['count50'],$player_best['countmiss'])." acc</th></tr>"; 
            echo "</table>  </div>";
            echo "<div class='stats'>
            <p class='icon_stats_star'> </p> ".round($json_song_checker[0]['difficultyrating'],1)." 
            <p> <img src='https://osu.ppy.sh/images/layout/beatmapset-page/total_length.svg' class='icon_stats' title='time length'> ".timeCorrect($json_song_checker[0]['total_length'])." </p>
            <p><img src='https://osu.ppy.sh/images/layout/beatmapset-page/bpm.svg' class='icon_stats'>".round($json_song_checker[0]['bpm'],0)." </p>
            <p class='icon_stats'> AR </p> ".$json_song_checker[0]['diff_approach']." 
            <p class='icon_stats'> CS </p> ".$json_song_checker[0]['diff_size']."
            <p class='icon_stats'> OD </p> ".$json_song_checker[0]['diff_overall']." 
            <p class='icon_stats'> HP </p> ".$json_song_checker[0]['diff_drain']." 
            </div>
            <div class='poziom2'>
            ";
            echo "<table class='scoreCount'><tr><td>";
            if($player_best['perfect'] == 1) {
                echo "<div class='combo'>FULL COMBO</div></td></tr>";
            }
            else {
                echo "<div class='combo'>".number_format($player_best['maxcombo'])."/".number_format($json_song_checker[0]['max_combo'])."</div></td></tr>";
            }
            echo "<tr><td><span class='hit300'>".$player_best['count300']."</span><span class='separator'>/</span><span class='hit100'>".$player_best['count100']."</span><span class='separator'>/</span><span class='hit50'>".$player_best['count50']."</span></td></tr></table>";
            //===========
            echo "<p style='width: 33%;'><img src='img/".$player_best['rank']."-rank.png' class='.small-ico'></p>";
            echo "
            <p class='fullScores'>".number_format($player_best['score'])." points</p>";
            
            //TODO: sprawdzanie w bazie danych. Odciążenie requestów. Jeżeli dana beatmapa nie istnieje w bazie, trzeba ją dodać wraz z potrzebnymi informacjami, w przeciwnym wypadku ma pobrać informacje z bazy. 
            echo "</div>";
                
            
            
            
             
            echo "</div>";

            if($pos % 2 == 0) {
                echo "</div><div class='pls'>";
            }
            echo "<script>console.log('".$pos."')</script>";
            $pos++;
            
        }
        unset($pos);
    }

    else {
        echo "user nie istnieje";
        exit();
    }

}
?>
            <h2>Recent plays</h2>
<?php
        
        //echo recent($json_recent);
        
        ?>
    </body>

    </html>
