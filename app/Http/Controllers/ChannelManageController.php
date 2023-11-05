<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ChannelManageController extends Controller
{
    public function main()
    {
        return view('manage_channel');
    }

    public function index()
    {
        $channel = Channel::all()->where('user_id', '=', Auth::user()->id);

        return view('channels_index', compact('channel'));
    }

    public function create()
    {
        return view('channels_create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'link' => 'string',
            'user_id' => 'integer'
        ]);

        Channel::firstOrCreate([
            'link' => $data['link']
        ], [
            'title' => $data['title'],
            'link' => $data['link'],
            'user_id' => $data['user_id']
        ]);

        return redirect()->route('channels.index');
    }

    public function indexForEdit()
    {
        $channel = Channel::all()->where('user_id', '=', Auth::user()->id);

        return view('index_for_edit', compact('channel'));
    }

    public function edit(Channel $channel)
    {
        return view('edit', compact('channel'));
    }

    public function update()
    {
        $data = request()->validate([
            'id' => 'integer',
            'title' => 'string',
            'link' => 'string',
        ]);

        $channel = Channel::find($data['id']);

        $channel->title = $data['title'];
        $channel->link = $data['link'];

        $channel->save();

        return redirect()->route('index_for_edit');
    }

    public function indexForDelete()
    {
        $channel = Channel::all()->where('user_id', '=', Auth::user()->id);

        return view('index_for_delete', compact('channel'));
    }

    public function confirm_delete(Channel $channel)
    {
        return view('confirm_delete', compact('channel'));
    }

    public function destroy()
    {
        $data = request()->validate([
            'id' => 'integer'
        ]);

        $channel = Channel::find($data['id']);

        $channel->delete();

        return redirect()->route('index_for_delete');
    }
}
