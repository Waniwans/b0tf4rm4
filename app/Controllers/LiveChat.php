<?php

namespace App\Controllers;

class LiveChat extends BaseController
{
    public function index()
    {
        return view('live_chat');
    }
    public function history()
    {
        return view('live_chat_history'); 
    }
}
