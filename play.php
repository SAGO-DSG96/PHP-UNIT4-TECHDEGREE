<?php

/**
 * Autoloader Function
 */
require 'inc/config.php';

//Initialize session
session_start();

// Report simple running errors
error_reporting(E_ALL);
// Make sure they're on screen
ini_set('display_errors', 1);
// HTML formatted errors
ini_set("html_errors", 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Reset game and variables
    if (isset($_POST['start-game'])) {
        unset($_SESSION['selected']);
        unset($_SESSION['phrase']);
    } 

    //If post request is key AND IS NOT SET
    if (!isset($_POST['key'])) {
        //Create new game
        $_SESSION['phrase']  = new Phrase();
        $_SESSION['game'] = new Game($_SESSION['phrase']);
    }
    else{
        //Add a key pressed to $_SESSION['selected'] array
        $_SESSION['phrase']->selected[] = filter_input(INPUT_POST, 'key', FILTER_SANITIZE_STRING);
    }
}

require 'views/header.php';

    //If have some output enter and show form to play again
    if ($_SESSION['game'] -> gameOver()) {
        //Message winner or loser with correct Phrase
        echo $_SESSION['game'] -> gameOver();
        //Form to play again
        echo '<form method="POST" action="play.php">'
             .'<input id="btn__reset" type="submit" name="start-game" value="Start Game"/>'
             .'</form>';
    }else{ //If not continue with game
        echo $_SESSION['phrase']  -> addPhraseToDisplay();
        echo $_SESSION['game']  -> displayKeyboard();
        echo $_SESSION['game']  -> displayScore();
    }

?>

    <!-- Script to read keyboard-->
    <script>
        //Script adapted from https://stackoverflow.com/questions/1846599/how-to-find-out-what-character-key-is-pressed
        //Add listener to documents when keyup call logKey
        document.addEventListener('keyup', logKey);


        function logKey(e) {
            var keynum;
            //Idenitfy Browser assign key to keynum variable
            if(window.event) {                    
                keynum = event.keyCode; //IE 
            } 
            else if(event.which){ // Netscape/Firefox/Opera                   
                keynum = event.which;
            }
            //Transform from HEX CODE to CHAR
            keynum = String.fromCharCode(keynum);
            //Transform to lowercase
            keynum = keynum.toLowerCase();
            //Object FORMDATA to send POST REQUEST
            var datos = new FormData();
            //Append info of keyvalue
            datos.append('key', keynum);
            //Send
            fetch('play.php', {
                method: 'POST',
                body: datos
            });
            //Reload page to see efects
            location.reload(true);
        }
    </script>

<?php
require 'views/footer.php';
?>
