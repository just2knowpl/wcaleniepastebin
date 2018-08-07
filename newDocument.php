<?php
define('ROOTPATH', dirname(__FILE__));
include (ROOTPATH."/includes/connect.php");
hasPerms(0);
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
    * - require
    <!--

* Walidacja,
* Wygeneruj losowy 9 znakowy ciąg url,
* Sprawdź, czy istnieje w bazie, 
* Jeśli tak to dodaj do bazy,
* Jesli nie to losuj ponownie,
* Przejdź do dokumentu
-->
