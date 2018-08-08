<?php
define('ROOTPATH', dirname(__DIR__));
include (ROOTPATH."/includes/checkFunctions.php");
hasPerms(0);
$cur = mysqli_real_escape_string($conn,basename($_SERVER["SCRIPT_FILENAME"], '.php'));
echo $cur;
$res = mysqli_query($conn, "SELECT * FROM `docs` WHERE `url` = '".$cur."'");
if($res) {
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $autor = $row['author'];
    $title = $row['title'];
    $text = $row['text'];
    
}
mysqli_close($conn);
?>
    <p>Created by:
        <?php echo $autor; ?>
    </p>
    <p>Date: null</p>

    <p>Title:
        <code><?php echo $title; ?></code>
    </p>

    <p>Content:
        <code><?php echo $text; ?></code>
    </p>


    <p>Easy copy box</p>

    <a href="../index.php">Main Page</a>
