<?php

function registerUser() {
    
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