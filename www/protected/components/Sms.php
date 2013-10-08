<?php

class Sms extends CComponent {

    const API_URL = 'http://smspilot.ru/api.php';
    const API_KEY = 'KE65A0GA2U1J4874MH3467PI6KI3NT2KX7OO8BA24545EF5036104I52276R6E5S';

    public static function send($to, $message) {
        $url = self::API_URL . '?' . 'send=' . urlencode($message) . '&to=' . $to . '&from=TestSMS&apikey=' . self::API_KEY;
        $result = file_get_contents($url);
        if ( false === $result ) {
            return false;
        }
        return true;
    }

}