<?php

class app_AppConfig {  
  
    static public function getDSN () {  
        return "mysql:host=localhost;dbname=dev_buyme";  
    }  
  
    static public function getDbUser ()  {  
        return "root";  
    }  
  
    static public function getDbPassword () {  
        return "";  
    }  
} 
?>