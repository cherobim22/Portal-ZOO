<?php

session_start();


class FlashMessages {

   
    public static function setMessages($messages_array, $type = 'info'){
        $_SESSION['messages'][$type] = $messages_array;
    }

    public static function getMessages($type = 'info'){
        $messages = null;
        
        if(isset($_SESSION['messages'][$type])){
            $messages = isset($_SESSION['messages'][$type]) ? $_SESSION['messages'][$type] : null;
            unset($_SESSION['messages'][$type]);  
        }
        
        return $messages;


    }



}

?>