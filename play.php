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
        //Add listener to documents when keydown call logKey
        //Recieve help from, Jennifer Nordell: https://treehouse-php-102.slack.com/archives/CKJ9PV3MH/p1597941387005300?thread_ts=1597941015.005100&cid=CKJ9PV3MH
        document.addEventListener('keydown', function(event) {
        //Returns an array-like object of all child elements which have all of the given class name(s)
          var keyboard = document.getElementsByClassName('key');
        //Property returns the value of the key pressed by the user
          var key_press = event.key;
        //Select all the keys by choosing the "key" class. Loop through. If the key matches the class, call the .click() event on that key
          for(var i= 0; i <= keyboard.length -1; i++) {
              if(key_press == keyboard[i].value) {
                keyboard[i].click();
              }
          }
        });
    </script>

<?php
require 'views/footer.php';
?>
