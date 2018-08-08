<?php
define('ROOTPATH', dirname(__DIR__));
include (ROOTPATH."/includes/checkFunctions.php");
hasPerms(0);
$cur = basename($_SERVER["SCRIPT_FILENAME"], '.php');
echo $cur;
//$res = mysqli_query($conn, "SELECT * FROM `docs` WHERE `url` = ")
?>
    <p>Created by:
        <?php echo ifLogin(); ?>
    </p>
    <p>Date: null</p>

    <p>Title:</p>

    <p>Content: </p>


    <p>Easy copy box</p>
