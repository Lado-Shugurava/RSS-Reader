<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function report(): \Illuminate\Contracts\View\View
    {
        $url = "https://xakep.ru/feed/";
        $channelName = "Xakep.ru";
        $channelName = stripcslashes($channelName);
        $channelName = htmlspecialchars($channelName);
        $content = file_get_contents($url);
        $items = new \SimpleXMLElement($content);

        return View::make('news', compact('items', 'channelName'));
    }
}
