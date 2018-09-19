<?php

function checkNazwa($username) {
    if(isset($username)) {
        $usernameV = mysqli_real_escape_string($username);
        $query = mysqli_query(dbConn(),"SELECT `` FROM `` WHERE `` = `".$usernameV."`");
        if($query) {
            return false;
        }
        return true;
    }
}
function checkHaslo($password,$powtorzPassword) {
        $firstPassword = md5($password);
        $secondPassword = md5($powtorzPassword);
    
        if($firstPassword == $secondPassword)) {
            return true;
        }
        return false;
}
function checkEmail($email) {
    
}

function registerUser($sprawdzonyName,$sprawdzonyPass,$sprawdzonyInfo,$sprawdzonyEmail,$sprawdzonyNick) {
        if($sprawdzonyName || $sprawdzonyPass || $sprawdzonyInfo || $sprawdzonyEmail || $sprawdzonyNick) {
            /*...*/
            
        }
    }
function ifInformacje($infoStatus) {
    if($infoStatus) {
        return true;
    }
    return false;
}
function registerEtap() {
    if(isset($_SESSION['registerEtap'])) {
        return $_SESSION['registerEtap'];
    }
    if (isLogin()) {
        getAccess($_SESSION['user']);
    }
    return 1;
}
function setRegisterEtap() {
    if(!isset($_SESSION['registerEtap'])) {
        $_SESSION['registerEtap']=1;
    }
     $_SESSION['registerEtap']+=1;
    }

function loginUser() {
    
}
function getUserId() {
    
}
function setUserData($password,$email,$profile_url) {
    
}

?>
