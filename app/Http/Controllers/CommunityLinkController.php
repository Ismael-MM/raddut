<?php

namespace App\Http\Controllers;

use App\Models\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Channel;
use App\Http\Requests\CommunityLinkForm;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        if ($channel != null) {
            $links = CommunityLink::where('approved', true, 'and')->where('channel_id', $channel['id'])->latest('updated_at')->paginate(25);
        }else{
            $links = CommunityLink::where('approved', true)->latest('updated_at')->paginate(25);
        }
        $channels = Channel::orderBy('title','asc')->get();
        return view('community/index', compact('links','channels', 'channel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityLinkForm $request)
    {
        $link = new CommunityLink();
        $link->user_id = Auth::id();

        $approved = Auth::User()->isTrusted();

        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['approved'] = $approved;

        
        if ($link->hasAlreadyBeenSubmitted($data['link'])) {
            if ($approved == 1) {
                return back()->with('success','Tu link a sido actualizdo');
            }else{
                return back()->with('info','Tu link ya existe, la actualización tiene que ser revisada por un administrador');
            }
        }else{
            CommunityLink::create($data);
            if ($approved == 1) {
                return back()->with('success','Tu link a sido publicado');
            }else{
                return back()->with('info','Tu link tiene que ser revisado por un administrador');
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
