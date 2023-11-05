<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $channel = Channel::all()->where('user_id', '=', Auth::user()->id);
        return view('dashboard', compact('channel'));
    }

    public function report()
    {
        $url = $_POST['feed_link'];
        $channelName = $_POST['feed_title'];
        $channelName = stripcslashes($channelName);
        $channelName = htmlspecialchars($channelName);
        $content = file_get_contents($url);
        $items = new \SimpleXMLElement($content);

        return view('news', compact('items', 'channelName'));
    }
}
