<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CommunityLink;

use App\Channel;

class CommunityLinksController extends Controller
{
    //

    public function index(Channel $channel = null)
    {


      $links = CommunityLink::forChannel($channel)
      ->latest('updated_at')
      ->paginate(5);

      $channels = Channel::orderBy('title', 'asc')->get();



      return view('community.index', compact('links', 'channels', 'channel'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'channel_id' => 'required|exists:channels,id',
          'title' => 'required',
          'link' => 'required|url'

      ]);

      CommunityLink::from(auth()->user())
              ->contribute($request->all(), $this);


        // flash()->Success('Successfully Submitted Article');

      return back();
    }

    public function whenSpecialCircumstance()
    {
      flash()->Success('Already Subbmited');

      return back();
    }
}
