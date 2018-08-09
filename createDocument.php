<?php
define('ROOTPATH', dirname(__FILE__));
include (ROOTPATH."/includes/checkFunctions.php");
hasPerms(0);
?>
    <html>

    <head>
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.js.map"></script>
    </head>

    <body>
        <div class="container">
            Creating as:
            <?php echo ifLogin(); ?>
            <!--Data dodania-->

            <form action="" method="post">
                <p>Topic *</p>
                <input type="text" placeholder="Your Topic" name="topic">
                <p>text area *</p>
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text" placeholder="Your text"></textarea>
                </div>

                <input type="submit" class="btn btn-primary btn-lg btns-add" value="Add">
                <input type="button" class="btn btn-secondary btn-lg btns-cancel" value="Cancel" name="cancel">
            </form>
            * - require
            <?php
    if(!empty($_REQUEST['topic']) && !empty($_REQUEST['text'])) {
            $topic = mysqli_real_escape_string($conn, $_REQUEST['topic']);
            $text = mysqli_real_escape_string($conn, $_REQUEST['text']);
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
                $czas = date("Y-m-d H:i:s");
                //dodanie rekordu do bazy
                mysqli_query($conn, "INSERT INTO `docs` (`url`, `title`, `text`, `author`, `data`) VALUES ('".$randomUrl."', '".$topic."', '".$text."', '".ifLogin()."', '".$czas."');");
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

echo (is_readable($randomUrl.".php")) ? 'readable' : 'not readable';
        //przejscie na strone dokumentu
        header("Location: docs/$randomUrl");
        exit;
    }
else {
    echo '
    <div class="alert alert-danger" role="alert">
  Wszystkie pola muszą zostać wypełnione!
</div>';
}

?>

        </div>
    </body>

    </html>
