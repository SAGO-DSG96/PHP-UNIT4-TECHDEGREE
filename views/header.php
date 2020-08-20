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
        <style>
			.box {
			background-color: lightsalmon;
			-webkit-transition: background-color 2s ease-out;
			-moz-transition: background-color 2s ease-out;
			-o-transition: background-color 2s ease-out;
			transition: background-color 2s ease-out;
			}

			.box:hover {
			background-color: lightgreen;
			cursor: pointer;
			}
		</style>
    <div class="main-container <?php if(isset($_POST['start-game'])){ echo 'animate__animated animate__backInLeft';} ?>">
       <h2 class="header">Phrase Hunter</h2>