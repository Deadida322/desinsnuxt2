<?php 
$chatid = "-980476998";

$botToken = "5823524636:AAHUgReEE9QVTZVnxYOQ63WSuu6O6qag6Ag";

$phone = $_GET['phone'];
$name = $_GET['name'];
$message = $_GET['message'];
$resultMessage = "Номер телефона: ".$phone. " Имя: ".$name. PHP_EOL. " --------------------------".PHP_EOL." Информация: " . $message;
message_to_telegram('Привет!');

function message_to_telegram($text)
{
    global $chatid;
    global $botToken;
    global $resultMessage;
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . $botToken . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => $chatid,
                'text' => $resultMessage,
            ),
        )
    );
    curl_exec($ch);
}