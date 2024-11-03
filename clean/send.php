<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (!isset($_POST['ajax'])) {
        echo "-";
        die;
    }
} else {
    echo "-";
    die;
}

$name = htmlspecialchars(stripslashes($_POST['name']));
$phone = htmlspecialchars(stripslashes($_POST['phone']));
$date = htmlspecialchars(stripslashes($_POST['date']));
$mess = htmlspecialchars(stripslashes($_POST['message']));

$message =
    '     
 Заказал звонок на сайте Чистые пруды
 Имя: ' . $name . '  
  Телефон: ' . $phone . '     
Желаемая дата и время: ' . $date . '     
 Сообщение: ' . $mess;

$headers = 'Content-type: text; charset="utf-8"' . "\r\n" . 'From: chistye_prudy.ru <reception@chistye_prudy.ru>';

if (iconv_strlen($phone) > 3) {
    mail('reception@chistye_prudy.ru', "Заказ на сайте Чистые пруды!", $message, $headers);
}
