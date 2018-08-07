<?php
include ("includes/checkFunctions.php");
include ("includes/dbConn.php");
?>
    Creating as:
    <?php echo ifLogin(); ?>
    <!--Data dodania-->

    <form action="" method="get">
        <p>Topic *</p>
        <input type="text" placeholder="Your Topic" name="topic">
        <p>text area *</p>
        <p><textarea rows="7" cols="50" name="text"></textarea></p>

        <input type="submit" value="Add">
        <input type="button" value="Cancel" name="cancel">
    </form>

    <?php
    if(isset($_GET['cancel'])) {
        echo '
        <script>
        var url = "index.php";
        window.location = url;
        </script>';
    }
?>
        * - require
        <!--

* Walidacja,
* Wygeneruj losowy 9 znakowy ciąg url,
* Sprawdź, czy istnieje w bazie, 
* Jeśli tak to dodaj do bazy,
* Jesli nie to losuj ponownie,
* Przejdź do dokumentu
-->
