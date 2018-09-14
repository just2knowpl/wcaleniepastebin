<?php
    header("Content-type: text/css; charset: UTF-8");
    include("../functions/user_menager.php");
    include("../functions/general_functions.php");
?>

* {
    padding: 0;
    margin: 0 auto;
    text-align: center;
}
.register_element {
    display: none;
}
.register_element:nth-child(<?php echo registerEtap();?>) {
    display: block;
}
#buttonDalej {
    display: none;
}