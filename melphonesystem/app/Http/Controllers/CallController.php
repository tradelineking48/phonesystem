<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Twilio\Twiml;
use File;

class CallController extends Controller
{
     /**
     * Process a new call
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newCall(Request $request)
    {
        
        $response = new Twiml();
        $callerIdNumber = config('services.twilio')['number'];

        $dial = $response->dial(['callerId' => $callerIdNumber]);
        
        $phoneNumberToDial = $request->input('phoneNumber');

        if (isset($phoneNumberToDial)) {
//            $dial->number("+18189632950");
//            $dial->number("+8613146225501");
            $dial->number($phoneNumberToDial);
            $response->say("Thanks");
        } 
        else {
            $dial->client('support_agent');
            $response->say("Thanks for your reply");
        }
        $dial->number("+18189632950");
        $response->say("Thanks");

        return $response;
    }
}
