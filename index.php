<?php

function processMessage($update) {

    $response = $update['result']['parameters']['text'];
    $speech = "";

    switch($response ) {
        case 'hi':
            $speech = "Hi, how are you doing !";
            break;
        case 'bye':
            $speech = "Bye, ";
            break;
        default:
            $speech = "Sorry, Not Available !";
            break;
    }

    sendMessage(array(
        "source" => $update["result"]["source"],
        "speech" => $speech,
        "displayText" => $speech,
        "contextOut" => array()
    ));
}
 
function sendMessage($parameters) {
    echo json_encode($parameters);
}
 
$update_response = file_get_contents("php://input");
$update = json_decode($update_response, true);
if (isset($update["result"]["parameters"])) {
    processMessage($update);
    //echo "Hello, world !";
}
