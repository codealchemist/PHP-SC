<?php 
    //set global language
    define('LANG', 'es');
?>
<html>
    <head>
        <?php include('includes/head.php'); ?>
    </head>
    <body>
        <?php include('includes/header.php'); ?>

        <div id="shell"></div>
        <div id="shellInputContainer">
            <span>code@php-ps:$</span>
            <input type="text" id="shellInput" value=" " onkeypress="Shell.handleKeys()" />
        </div>
    </body>
</html>