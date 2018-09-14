<?php
function country($ct) {
    switch($ct) {
        case "PL":
            return "Poland";
            break;
        case "JP":
            return "Japan";
            break;
        case "FR":
            return "France";
            break;
        case "KR":
            return "Korea";
            break;
    }
}



function ppCalc($circles, $acc, $ar, $od) {
    //Circles lenhth multiply
    $pp = 0;
    //Length
    $multiplyLength = 0.95 + 0.4 * min(1.0,$circles/ 2000.0);
    echo "<script>console.log('".$multiplyLength."');</script>";
    
    $pp *= $multiplyLength;
        if ($circles > 0) {
            $pp *= min(pow($circles, 0.8) / pow($circles, 0.8), 1.0);
        }
    //Ar
        $arFactor = 1.0;
            if ($ar > 10.33) {
            $arFactor += 0.04 * ($ar - 10.33);
        } else if ($ar < 8.0) {
            $arFactor += 0.01 * (8.0 - $ar);
         }
    $pp *= $arFactor;
    
    //acc
    $accValue = pow(1.57, $od) * min(0.75,($acc * 0.0075)) * 2.83;
    
    $accValue *= min(1.15, pow($circles / 1000.0, 0.3));
    $pp += $accValue;
    
    //speed
    
    $multiplyLength = 0.95 + 0.4 * min(1.0,$circles/ 2000.0);
        $pp *= $multiplyLength;
        $pp *= pow(0.97,0);
        if ($circles > 0) {
            $pp *= min(pow($circles, 0.8) / pow($circles, 0.8), 1.0);
        }
    $accValue = pow(1.57, $od) * min(0.75,($acc * 0.0075)) * 2.83;
    $accValue *= min(1.15, pow($circles / 1000.0, 0.3));
    $pp += $accValue;
    return pow($pp,1.1);
   
}

function speedValue($circles, $acc) {
    if($circles > 2000) {
        $multiplyLength = 0.95 + (0.0002 * 2000);  
    }
    else {
        $multiplyLength = 0.95 + (0.0002 * $circles);  
    }
    $multiplyAcc = 0.25 + ($acc * 0.2);
    
    return $multiplyLength * $multiplyAcc;
}
function accCalc($hit300, $hit100, $hit50, $miss) {
    return round(((50*$hit50 + 100*$hit100 + 300*$hit300)/(300*($miss + $hit50 + $hit100 + $hit300)))*100,2)."%";
}
function timeCorrect($total_length) {
    $min = floor($total_length / 60);
    $sec = $total_length % 60;
    
    return $min.":".$sec;
}
function lastDate($date_pass) {
    $cur_date = $date('y m d h:i:s');
    return $cur_date - $date_pass;
}

function recent($json_recent) {
    
}
