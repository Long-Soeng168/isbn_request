<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class VerificationController extends Controller
{

    public function sendSms(Request $request)
    {
        // Validate the incoming request

        $to = '+85561561154';
        $body = 'Hello World, brolong.pro';

        // Twilio credentials from environment variables
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER'); // This is your Twilio phone number

        try {
            // Create a new Twilio client
            $twilio = new Client($sid, $token);

            // Send the SMS
            $message = $twilio->messages->create(
                $to, // Destination phone number
                [
                    'from' => $twilioPhoneNumber, // Your Twilio phone number
                    'body' => $body // SMS body
                ]
            );

            // Return the message SID as a response
            return response()->json(['sid' => $message->sid], 200);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API call
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
