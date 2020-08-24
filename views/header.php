<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phrase Hunter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
	<div class="main-container<?php 
	//Conditional show some transictions or not
		if(isset($_POST['start-game'])){ 
			echo ' animate__animated animate__backInLeft normal ';
		} 
		if($_SESSION['game'] -> gameOver()){
			echo ' box ';
		}
		elseif(!isset($_POST['start-game'])){
			echo ' normal ';
		}
		?>">
       <h2 class="header">Phrase Hunter</h2>