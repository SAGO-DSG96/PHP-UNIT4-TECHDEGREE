<?php

/**
 *  Phrase Class
 */

 class Phrase
 {
     // String => currentPhrase containing the current phrase to be used in the game.
     public $currentPhrase;

     // Array => selected An array of letters the user has guessed. Initialize the property to an empty array.
     public $selected = array();

     public $phrase;

     // Array => Random phrases 
     private $phrases = [
        'Boldness be my friend',
        'Leave no stone unturned',
        'Broken crayons still color',
        'The adventure begins',
        'Dream without fear',
        'Love without limits',
    ];

    /**
     * Phrase Constructor
     * @param String $currentPhrase OPTIONAL the current phrase as a String,
     * @param array $selectedLetter OPTIONAL selected letters as an array.
     */
    public function __construct($currentPhrase = null, array $selectedLetter = [])
    {
        if(!empty($currentPhrase)){
            $this -> currentPhrase = $currentPhrase;
        }else{
            $int = rand(0, count($this -> phrases) - 1);
            $this -> currentPhrase = $this -> phrases[$int];
        }
        if(!empty($selectedLetter)){
            $this -> selected = $selectedLetter;
        }
    }

    /**
     * Display or Hide character of phrase
     * @return String - with html tags as unorder list - each letter is <li> item
     */
    public function addPhraseToDisplay()
    {
        //Create and clean our output
        $output = '';
        $characters = array();
        
        $output .= '<div id="phrase" class="section">';
        //Setting up format
        $output .= '<ul>';
        //Split string (phrase) into lowercase characters
        $characters = str_split(strtolower($this->currentPhrase));

        //Foreach character add and setup up format
        foreach ($characters as $char) {
            if ($char == " ") {
                $output .= '<li class="hide space"> </li>';
            }
            //If char is NOT in selected array HIDE letter
            elseif (!in_array($char, $this -> selected)) {
                    $output .= '<li class="hide letter ' . $char  . '">' . $char . '</li>';
            }
            //else SHOW letter
            else{
                $output .= '<li class="show letter ' . $char  . '">' . $char . '</li>';
             }
               
            }
        $output .= '</ul>';
        $output .= '</div>';

        return $output;
    }

    /**
     * Check if a letter has already choosen
     * @param String $letter - Letter to compare that have already exist
     * @return Bool - True is already exist - false is not
     */
    public function checkLetters($letter)
    {
        
        //Search in $characters array is it exist $letter
        if (in_array($letter, $this -> getLetterArray())) {
            return true;
        }
        else{

            return false;
        }
    }

    /**
     * check a specific letter against the letters in the current phrase
     * @return Array - unique lowercase letters
     */
    public function getLetterArray()
    {
        //Array of unique lowercase letters only in the currentPhrase
        $characters = array_unique(str_split(str_replace(
            ' ',
            '',
            strtolower($this->currentPhrase)
            )));

        return $characters;
    }

    /**
     * function to compare the `selected` letter array with the array returned from the 
     * getLetterArray method. It will returns the values in selected that are
     * NOT present in any of the `getLetterArray`.
     * @return Int - values in selected that are NOT present in any of the `getLetterArray`
     */
    public function numberLost()
    {
        return count(array_diff($this->selected, $this->getLetterArray()));
    }
 }