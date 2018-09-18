<?php
session_start();
function dbConn() {
    $db_user = 'localhost';
    $db_name = 'root';
    $db_pass = '';
    $db_host = 'osucenter';
    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    if($conn) {
        return $conn;
    }
}
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