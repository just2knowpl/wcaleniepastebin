<html>

<head>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.js.map"></script>
</head>

<body>
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
    //$text = $row['text'];
    $text = nl2br(str_replace('>','&gt;',str_replace('<','&lt;',$row['text'])));
    
}
mysqli_close($conn);
?>
        <p>Created by:
            <?php echo $autor; ?>
        </p>
        <p>Date: null</p>

        <p>Title:
            <code><?php echo strip_tags($title, '<script></script>'); ?></code>
        </p>

        <p>Content:
            <?php echo strip_tags($text, '<script></script>'); ?>
        </p>


        <p>Easy copy box</p>
        <input class="form-control" type="text" value=" <?php echo strip_tags($text, '<script></script>'); ?>" readonly>
        <a href="../index.php">Main Page</a>
</body>

</html>
