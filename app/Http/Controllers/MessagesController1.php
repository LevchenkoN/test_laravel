<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Messages;
use http\Message;
use Illuminate\Http\Request;
use function Symfony\Component\String\u;
use Illuminate\Support\Carbon;


class MessagesController1 extends Controller
{
    public function index(){
        $messages = Messages::where('created_at', '>', Carbon::now()->subMinutes(180))->get();
        if (isset($messages) ) {
            foreach ($messages as $m => $value){
                $result [$m] = array(
                    'email' => $value['email'],
                    'body' => $value['body'],
                    'time' => $value['created_at']
                );
            }
        }
        if (!isset($result))
        {
            $result [0]= array(
                'email' => '',
                'body' => 'Свежих сообщений пока нет',
                'time' => ''
            );
        }
        return $messages;
    }

    public function store(Request $request){
        if (isset($request->email) && isset($request->body) ) {
            $result = array(
                'email' => $request->email,
                'body' => $request->body
            );

          echo json_encode($result);

            $message = new Messages();
            $message->body = $request->body;
            $message->dateTime = Carbon::now();
            $message->email = $request->email;
            $message->save();
        }
    }
}
