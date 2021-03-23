<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;
use App\Invoice;

class Helper
{
  public static function sendErrorTwilioSms($text)
  {
      $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
      $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
      $appSid     = config('app.twilio')['TWILIO_APP_SID'];
      $client = new Client($accountSid, $authToken);
      try
      {
      
      }
      catch (Exception $e)
      {
          echo "Error: " . $e->getMessage();
      }
  }

  

}

?>
