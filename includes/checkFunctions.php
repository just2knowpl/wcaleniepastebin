<?php
session_start();
//Funkcja sprawdza czy uzytkownik jest zalogowany
function ifLogin() {
    if(isset($_SESSION['user'])) {
        return $_SESSION['user'];
}
    else {
        return "anonymous";
    }
}


?>
