<?php

/**
 *  Game Class
 */

 class Game
 {
     // Object => Phrase class - containing the current phrase to be used in the game.
    public $phrase;

    // Int => Used to set how many wrong guesses a player has before Gameover. This should be set to 5.
    private $lives = 5;

    /**
     * Game Constructor
     * @param $phrase REQUIRED Phrase object.
     */
    public function __construct($phrase)
    {
        $this -> phrase = $phrase;
    }

    /**
     * Display keyboard form
     * @return String formated with html tags that builds the HTML of a form with each letter being a submit button.
     */
    public function displayKeyboard()
    {
        //Implementation of form $POST type
        $output = '<form method="post" action="play.php">';
        $output .= '<div id="qwerty" class="section">';
            $output .= '<div class="keyrow">';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('q') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('w') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('e') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('r') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('t') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('y') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('u') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('i') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('o') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('p') .'></input>';
            $output .= '</div>';

            $output .= '<div class="keyrow">';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('a') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('s') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('d') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('f') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('g') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('h') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('j') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('k') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('l') .'></input>';
            $output .= '</div>';

            $output .= '<div class="keyrow">';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('z') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('x') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('c') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('v') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('b') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('n') .'></input>';
                $output .= '<input type="submit" name="key" value=' . $this->handleLetterKey('m') .'></input>';
                $output .= '</div>';
        $output .= '</div>';
        $output .= '</form>';
        return $output;
    }

    /**
     * Display score hearts images 
     * @return String - HTML unorded list with images.
     */
    public function displayScore()
    {
        $output = '';
        $output .= '<div id="scoreboard" class="section">';
        $output .= '<ol>';
        //Implementation of live hearts images
        require_once(dirname(dirname(__DIR__)) . '/views/scoreboard.php');
        for ($i=0; $i < $this->lives - $this->phrase->numberLost(); $i++) { 
            $output .= $live;
        }
        //Implementation of lost hearts images
        for ($i=0; $i < $this->phrase->numberLost(); $i++) { 
            $output .= $kill;
        }
        $output .= '</ol>';
        $output .= '</div>';

        return $output;
    }

    /**
     * Add CSS to a selected letter according if its correct, incorrect or it is a space
     * @param $letter - letters for the keyboard.
     */
    function handleLetterKey($letter)
    {
        if (!in_array($letter, $this->phrase->selected)){
            return '"' . $letter . '" class="key"' ;
        }
        else{
            if($this -> phrase ->checkLetters($letter)){
                return '"' . $letter . '"' . ' disabled class="correct key" id="' . $letter . '"' ;
            }
            else{
                return '"' . $letter . '"' . ' disabled class="incorrect key " id="' . $letter . '"';
            }
        }
    }

    /**
     * Compare $lives with $phrase->numberLost()
     * @return Bool - True if $lives is the same value in $phrase->numberLost() , false is not
     */
    public function checkForLose()
    {
       if($this->lives <= $this->phrase->numberLost()){
            return true;
       }
       else{
           return false;
       }
    }

    /**
     * If comparison true return HTML
     * @return String Lose message
     */
    public function gameOver()
    {
        if($this -> checkForLose() == true){
            $output = '<h1 id="game-over-message" class="box">The phrase was: "' . $this->phrase->currentPhrase .'  " Better luck next time!</h1>';
            return $output;
        }else if($this -> checkForWin() == true){
            $output =  '<h1 id="game-over-message" class="box">Congratulations on guessing: "' . $this->phrase->currentPhrase . '"</h1>';
                return $output;
        }
    }

    /**
     * 
     */
     //this method checks to see if the player has selected all of the letters
     function checkForWin()
     {
       if (count(array_intersect($this->phrase->selected, $this->phrase->getLetterArray())) == count($this->phrase->getLetterArray()))
       {
         return true;
 
       } else {
         return false;
       }
     }

 }