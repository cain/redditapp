<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CommunityLink;

use App\Channel;

class CommunityLinksController extends Controller
{
    //

    public function index()
    {
      $links = CommunityLink::paginate(25);
      $channels = Channel::orderBy('title', 'asc')->get();



      return view('community.index', compact('links', 'channels'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'channel_id' => 'required|exists:channels,id',
          'title' => 'required',
          'link' => 'required|url|unique:community_links'

      ]);

      CommunityLink::from(auth()->user())
              ->contribute($request->all());


      flash()->Success('Successfully Submitted Article');

      return back();
    }
}
