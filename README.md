
H1 Treehouse Techdegree PHP - Project 4 - OOP 
=============

#How it work?
-------------

In [images folder](https://github.com/SAGO-DSG96/PHP-UNIT4-TECHDEGREE/tree/master/images) you can find resources that are implemented to keep score in game.

In [views folder](https://github.com/SAGO-DSG96/PHP-UNIT4-TECHDEGREE/tree/master/images) you can find header and footer files as well scoreboard.php that uses resources from [images folder](https://github.com/SAGO-DSG96/PHP-UNIT4-TECHDEGREE/tree/master/images) to return formated html.

In [css folder](https://github.com/SAGO-DSG96/PHP-UNIT4-TECHDEGREE/tree/master/css) has styles.css that perform all style in game.
At the end of styles.css was added personal stylesheets, the selectors box and box:hover perform a transition color from light salmon to lightgreen. This styles runs at the intro of the game and at the end of this. The normal selector only works when you are playing and hide when finish the game.
In addition, the game integrate https://animate.style/ code to animate keyboard and transitions in game. 

In [inc folder](https://github.com/SAGO-DSG96/PHP-UNIT4-TECHDEGREE/tree/master/inc) tou will find config.php that runs an autoloader function to find resources in [classes folder](https://github.com/SAGO-DSG96/PHP-UNIT4-TECHDEGREE/tree/master/inc/classes) that have Game.php that have methods that control the flow of the game that require an object of Phrase.php in addition run some javascript to integrate keyboard. The Phrase calls has methods to select phrases, verify if a letter have been chosen and others.

#How will graded?
-------------

![](https://github.com/SAGO-DSG96/PHP-UNIT4-TECHDEGREE/blob/master/evaluation-resources/readme%20resources/rubric.png)

#How to play?
-------------

1. Start game
![](https://github.com/SAGO-DSG96/PHP-UNIT4-TECHDEGREE/blob/master/evaluation-resources/readme%20resources/start-game.png)

2. Try to guess the hidden phrase you can use your keyboard or if you prefer keyboard on monitor
![](https://github.com/SAGO-DSG96/PHP-UNIT4-TECHDEGREE/blob/master/evaluation-resources/readme%20resources/playing.png)

3. Do not worry if you can not guess the phrase, it would generate a different one so keep playing.
![](https://github.com/SAGO-DSG96/PHP-UNIT4-TECHDEGREE/blob/master/evaluation-resources/readme%20resources/win.png)

4. Try to guess all phrases and do not forget to share with friends your goals
