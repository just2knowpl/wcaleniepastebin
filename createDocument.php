<?php
define('ROOTPATH', dirname(__FILE__));
include (ROOTPATH."/includes/checkFunctions.php");
hasPerms(0);
?>
    Creating as:
    <?php echo ifLogin(); ?>
    <!--Data dodania-->

    <form action="" method="post">
        <p>Topic *</p>
        <input type="text" placeholder="Your Topic" name="topic">
        <p>text area *</p>
        <p><textarea rows="7" cols="50" name="text" placeholder="Your code"></textarea></p>


        <input type="submit" value="Add">
        <input type="button" value="Cancel" name="cancel">
    </form>
    * - require
    <?php
    if(!empty($_REQUEST['topic']) && !empty($_REQUEST['text'])) {
            $topic = mysqli_real_escape_string($conn, $_REQUEST['topic']);
            $text = nl2br(mysqli_real_escape_string($conn, $_REQUEST['text']), false);
            $exist = true;
    while ($exist == true) {
            $randomUrl = mysqli_real_escape_string($conn, uniqid());
            $query = mysqli_query($conn, "SELECT * FROM `docs` WHERE `url` = '".$randomUrl."'"); 
            if(mysqli_fetch_array($query) !== false)
            { 
                $exist = false;
                if($GLOBALS['debug'] == 1) {
                echo "<script>console.log('Ciąg znaków wolny. Tworzenie url..');</script>";
            }
                //dodanie rekordu do bazy
                mysqli_query($conn, "INSERT INTO `docs` (`url`, `title`, `text`) VALUES ('".$randomUrl."', '".$topic."', '".$text."');");
            }
            else {
                $exist = true;
                if($GLOBALS['debug'] == 1) {
                echo "<script>console.log('Ciąg znaków został zlokalizowany w bazie danych.. Generuje nowy ciąg.');</script>";
            }        
            }
        }
        
 
        //generowanie nowej strony
$sites = realpath(dirname(__FILE__)).'/docs/';
$newfile = $sites."/".$randomUrl.".php";

    $newcontent = file_get_contents("template.php");
    $fh = fopen($newfile, 'wb');
    fwrite($fh, $newcontent);


fclose($fh);
chmod($newfile, 0777);

// echo (is_writable($filnme_epub.".js")) ? 'writable' : 'not writable';
echo (is_readable($randomUrl.".php")) ? 'readable' : 'not readable';
        //przejscie na strone dokumentu
        header("Location: docs/$randomUrl");
        exit;
    }
else {
    echo "Wszystkie pola muszą zostać wypełnione!";
}

?>
        <!--

* Walidacja,
* Wygeneruj losowy 9 znakowy ciąg url,
* Sprawdź, czy istnieje w bazie, 
* Jeśli tak to dodaj do bazy,
* Jesli nie to losuj ponownie,
* Przejdź do dokumentu
-->
