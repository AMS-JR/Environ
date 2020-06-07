<?php
define('TEST',  getenv('TEST'));
define('API', getenv('API'));
define('PASSWORD',  getenv('PASSWORD'));
class Amadou{
//    const TEST = getenv('TEST');
//    const API = getenv('API');
public function env(){
 echo TEST." and ".API." pwd: ".PASSWORD;
   }
 }
?>
