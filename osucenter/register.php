<?php
include("functions/general_functions.php");
include("functions/user_menager.php");


?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/css-register.php" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <form action="" method="POST">
        <section class='register_element'>
            <h2>
                <?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse("general_settings")['lang']['lang'])['rejestracja']['PodajImie']; ?>
            </h2>
            <input type="text" name="nickname" require>
            <div id="buttonDalej">
                <input type="button" value="<?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse(" general_settings")['lang']['lang'])['ogolne']['Dalej']; ?>" name="dalej">
            </div>
        </section>
        <section class="register_element">
            <h2>
                <?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse("general_settings")['lang']['lang'])['rejestracja']['PodajHaslo']; ?>
            </h2>
            <input type="password" name="password" require>
        </section>
        <section class="register_element">
            <h2>
                <?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse("general_settings")['lang']['lang'])['rejestracja']['PotworzHaslo']; ?>
            </h2>
            <input type="password" name="potworzPassword" require>
        </section>
        <section class="register_element">
            <h2>
                <?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse("general_settings")['lang']['lang'])['rejestracja']['PodajEmail']; ?>
            </h2>
            <input type="email" name="email" require>
        </section>
        <section class="register_element">
            <h2>
                <?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse("general_settings")['lang']['lang'])['rejestracja']['WysylanieInformacji']; ?>
            </h2>
            <input type="button" name="sendInformacje_Yes" value="<?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse("general_settings")['lang']['lang'])['ogolne']['Tak']; ?>">
            <input type="button" name="sendInformacje_No" value="<?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse("general_settings")['lang']['lang'])['ogolne']['Nie']; ?>">
        </section>
        <section class="register_element">
            <h2>
                <?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse("general_settings")['lang']['lang'])['rejestracja']['PodajNickWOsu']; ?>
            </h2>
            <input type="text" name="osu_nick" require>
        </section>
        <section class="register_element">
            <h2>
                <?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse("general_settings")['lang']['lang'])['rejestracja']['ZakonczRejestracje']; ?>
            </h2>
            <input type="submit" value="<?php echo jsonLocalFileParse('lang_'.jsonLocalFileParse("general_settings")['lang']['lang'])['rejestracja']['ZarejestrujSie']; ?>">
        </section>
    </form>
    <?php 
    if(!empty($_POST['password']) && !empty($_POST['potworzPassword'])) {
        if(checkHaslo($_POST['password'],$_POST['potworzPassword'])) {
            echo "Hasla zgadzają się";
        }
        else if(!checkHaslo($_POST['password'],$_POST['potworzPassword'])) {
            echo "Hasła nie pasują do siebie";
        }
    }
    //registerUser($_POST['nickname'],$_POST['password'],$potworzPassword,$_POST['email'],$infoStan,$_POST['osu_nick']);
    
    ?>
    <script>
        $('input[type=text]').keyup(function() {
            if ($(this).val().length)
                $('#buttonDalej').show();
            else
                $('#buttonDalej').hide();
        });

    </script>
</body>

</html>
