<?php

defined('ABSPATH') || exit;

class Degardc_SMS_Gateways
{
    public $mobile = [];
    public $input_data = '';
    public $senderNumber = '';
    private $username = '';
    private $password = '';
    private $pattern_code = '';

    public function __construct()
    {
        $this->username     = "";
        $this->password     = "";
        $this->senderNumber = "";
    }

    public static function get_sms_gateway()
    {
        $gateway = [
            'farazsms_pattern'          => 'farazsms.com'
        ];
    }


    public function farazsms_pattern()
    {
        $response = false;
        $username = $this->username;
        $password = $this->password;
        $from     = $this->senderNumber;
        $to       = $this->mobile;
        $input_data  = $this->input_data;
        $pattern_code = $this->pattern_code;

        if (empty($username) || empty($password)) {
            return false;
        }

        try {
            $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
            $sms_response = $client->sendPatternSms($from, $to, $username, $password, $pattern_code, $input_data);
        } catch (SoapFault $ex) {
            $sms_response = $ex->getMessage();
        }

        if ($sms_response == 1) {
            return true; // Success
        } else {
            $response = $sms_response;
        }
        return $response;
    }
}
