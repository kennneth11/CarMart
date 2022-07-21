<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use App\Models\ChMessage as Message;
use App\Models\ChFavorite as Favorite;
use Chatify\Facades\ChatifyMessenger as Chatify;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SendMessageController extends Controller
{

    public function sendSeller(Request $request)
    {
        // default variables
        $error = (object)[
            'status' => 0,
            'message' => null
        ];

        if (!$error->status) {
              // send to database
              $messageID = mt_rand(9, 999999999) + time();
              Chatify::newMessage([
                  'id' => $messageID,
                  'type' => 'user',
                  'from_id' => Auth::user()->id,
                  'to_id' => $request->seller_id,
                  'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
              ]);

              // fetch message to send it with the response
              $messageData = Chatify::fetchMessage($messageID);
              dd($messageData);
              // send to user using pusher
              Chatify::push('private-chatify', 'messaging', [
                  'from_id' => Auth::user()->id,
                  'to_id' => $request->seller_id,
                  'message' => Chatify::messageCard($messageData, 'default')
              ]);

          // send the response
          return Response::json([
              'status' => '200',
              'error' => $error,
              'message' => Chatify::messageCard(@$messageData),
              'tempID' => $request['temporaryMsgId'],
          ]);


          return redirect()->route('messages')
          ->with('success', 'Message Sent');
        }
    }
}
