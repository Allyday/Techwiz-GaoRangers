<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{

    function loadChat($sender_username, $receiver_username)
    {
        $data = [];

        $messSender = Message::where('sender_username', $sender_username)
            ->where('receiver_username', $receiver_username)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        // ->toArray();

        foreach ($messSender as $item) {
            array_push($data, $item);
        }

        $messReceiver = Message::where('sender_username', $receiver_username)
            ->where('receiver_username', $sender_username)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        // ->toArray();

        foreach ($messReceiver as $item) {
            array_push($data, $item);
        }

        //a descending sort
        usort($data, function ($item1, $item2) {
            return $item1['created_at'] <=> $item2['created_at'];
        });
        // dd($data);

        return $data;
    }


    public function index(Request $request)
    {

        $type = session('User');

        $user = User::where('id', $type)->first();

        if ($user['type'] == 2) {

            $data = $this->loadChat($user['userName'], '_1admin1');

            $receiver = User::where('userName', '_1admin1')->first();

            return view('chat.chat')
                ->with('user', $user)
                ->with('data', $data);
        }


        if ($user['type'] == 1) {

            if ($request->ajax()) {
                $data_us = User::where('type',2)->paginate(8);

                $users = [];
                foreach ($data_us as $item) {
                    array_push($users, $item);
                }
                return $users;
            }

            $data_us = User::where('type',2)->paginate(8);

            $users = [];
            foreach ($data_us as $item) {
                array_push($users, $item);
            }
            $data = [];

            return view('chat.chat', compact('users', 'user', 'data'));
        }
    }


    public function submit(Request $request)
    {
        $data = $request->all();


        $mess = new Message;
        $mess->sender_username = $data['sender'];
        $mess->receiver_username = $data['receiver'];
        $mess->message = $data['text'];
        $mess->save();

        event(new ChatEvent($mess));

        return $mess;
    }

    function getOneUser($username, Request $request)
    {
        if ($request->ajax()) {
            $userReceiver = User::where('userName', $username)->first();

            $data = $this->loadChat('_1admin1', $userReceiver['userName']);

            return [$data, $userReceiver];
        }
        return back();
    }

    function getMoreMess(Request $request)
    {
        $user_name_sender = $_GET['sender'];
        $user_name_receiver = $_GET['receiver'];


        if ($request->ajax()) {

            $data = $this->loadChat($user_name_sender, $user_name_receiver);
            $userReceiver = User::where('userName', $user_name_receiver)->first();

            return [$data, $userReceiver];
        }

        return back();
    }

    function getReceiver(Request $request)
    {
        if ($request->ajax()) {
            $userReceiver = User::where('userName', $_GET['receiver'])->first();
            return $userReceiver;
        }
    }
}
