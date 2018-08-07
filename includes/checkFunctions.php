<?php
//================USTAWIENIA GŁÓWNE==================

session_start(); //sesje aktywne
$debug = 1; //0 - debug off, 1 - debug on


//=================KONIEC USTAWIEŃ====================
    
//Funkcja sprawdza czy uzytkownik jest zalogowany
function ifLogin() {
    if(isset($_SESSION['user'])) {
        return $_SESSION['user'];
}
    else {
        return "anonymous";
    }
}

//Uprawnienia do wejścia na strone
function hasPerms($secureLvl) {
        switch ($secureLvl) {
        case 0.5: //TYLKO dla wylogowanych
             if(!isset($_SESSION['user'])) {
                 header("Location: ".ROOTPATH."/index.php");
             }
        case 0: //bez logowania
            if($GLOBALS['debug'] == 1) {
            echo "<script>console.log('Poziom uprawnień: 0. Wejście bez uprawnien');</script>";
            }
            break;
        case 1: //Zalogowany
            if(!isset($_SESSION['user'])) {
            header("Location: ".ROOTPATH."/index.php");
            if($GLOBALS['debug'] == 1) {
            echo "<script>console.log('Poziom uprawnień: 1. Wejście jako zalogowany');</script>";
            }}
            exit;
            break;
        case 2: //Moderator
            if($GLOBALS['debug'] == 1) {
            echo "<script>console.log('Poziom uprawnień: 2. Wejście możliwe tylko dla moderatorów +');</script>";
            }
            break;
        case 3: //Administrator
            if($GLOBALS['debug'] == 1) {
            echo "<script>console.log('Poziom uprawnień: 3. Tylko administrator');</script>";
            }
            break;
    }
    }

?>
