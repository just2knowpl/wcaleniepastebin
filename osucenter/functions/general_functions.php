<?php
session_start();
function jsonLocalFileParse($file_name) {
    /* 
    * Funkcja zwracająca jsona z pliku
    */
    $jsonFile = file_get_contents('functions/jsons/'.$file_name.".json");
    return json_decode($jsonFile, true);
}
function jsonWebParse($url,$api_key) {
    /* 
    * Funkcja zwracająca jsona z adresu URL
    */
}
function isLogin() {
    if(isset($_SESSION['user'])) {
        return true;
    }
    return false;

}
function getAccess($user) {
    if(!$user) {
        header("Location: index.php");
        return 0;
    }
}

?>