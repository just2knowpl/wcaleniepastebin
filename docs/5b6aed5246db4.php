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

        <p>Title:</p>
        <code><?php echo strip_tags($title, '<script></script>'); ?></code>


        <p>Content:</p>
        <?php echo nl2br(strip_tags($text, '<script></script>')); ?>



        <p>Easy copy box</p>
        <textarea class="form-control" value="<?php echo nl2br(strip_tags($text, '<script></script>')); ?>" readonly></textarea>-->
        <button type="button" class="btn btn-dark" onclick="copy()">Copy to clipboard</button>
        <a href="../index.php">Main Page</a>
        <script>
            function copy() {
                /* Get the text field */
                var copyText = document.getElementById("myInput");

                /* Select the text field */
                copyText.select();

                /* Copy the text inside the text field */
                document.execCommand("copy");

                /* Alert the copied text */
                alert("Copied the text: " + copyText.value);
            }

        </script>
</body>

</html>
