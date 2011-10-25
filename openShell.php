<?php
    /*
     * Opens shell connection and execute command in it.
     *
     * @author Alberto Miranda <alberto.php@gmail.com>
     */
    require_once 'classes/Shell.class.php';
    $shell = new Shell();

    //TODO: apply security
    //TODO: validate params
    
    //if no command return empty string
    if(!array_key_exists('command', $_POST)) return '';

    //receive command
    $command = $_POST['command'];

    try{
        //exec command and print response to standard output
        $output = $shell->execute($command);
        echo "<pre>code@php-sc:$ $command\n$output</pre>";
    } catch (Exception $e){
        //Houston, we have a problem!
        echo $e->getMessage() . "\n";
    }