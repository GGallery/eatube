<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Pusher\Pusher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function authenticate(Request $request) {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;

        $pusher = new Pusher('3c43af19787b93286341', 'a92fcb4b7765ce32c309', '660658', [
            'cluster' => 'eu',
            'encrypted' => true,
            'useTLS' => true,
        ]);

        $presence_data = ['name' => auth()->user()->name];
        $key = $pusher->presence_auth($channelName, $socketId, auth()->id(), $presence_data);

        return response($key);
    }
}
