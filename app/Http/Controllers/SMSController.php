<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AWS;
class SMSController extends Controller
{
    protected function sendSMS($phone_number='+8618792655916'){
        $sms = AWS::createClient('sns');

        $result =  $sms->publish([
            'Message' => 'Hello, This is just a test Message',
            'PhoneNumber' => $phone_number,
            'MessageAttributes' => [
                'AWS.SNS.SMS.SMSType'  => [
                    'DataType'    => 'String',
                    'StringValue' => 'Promotional',
                ]
            ],
        ]);
        dd($result);
    }
}
