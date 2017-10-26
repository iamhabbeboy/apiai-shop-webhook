<?php

function processMessage($update) {

    $response = $update['result']['parameters']['text'];
    $speech = "";

    switch($response ) {
        case 'hi':
            $speech = "Hi, how are you doing ! <img src='https://static.pexels.com/photos/5390/sunset-hands-love-woman.jpg' border='0' width='100' height='150'>";
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
