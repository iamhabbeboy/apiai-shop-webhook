<?php

 $method = $_SERVER['REQUEST_METHOD'];

 if( $method == 'POST') {
     $responseBody = file_get_contents('php://input');
     $json = json_decode($responseBody);
     $text = $json->result->parameters->text;
     
     switch ($text) {
        case 'hi':
            $speech = "Hi, Nice to meet you";
            break;
        case 'bye':
            $speech = "Bye, good night";
            break;
        default:
            break;
     }
     $response = new \stdClass();
     $response->speech = "";
     $response->displayText = "";
     $response->source = "webhook";
     echo json_encode($response);
 } else {
     echo 'Method Not Allowed !';
 }