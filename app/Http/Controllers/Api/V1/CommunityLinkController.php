<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use App\Http\Requests\CommunityLinkForm;
use App\Queries\CommunityLinksQuery;
use Illuminate\Support\Facades\Auth;

class CommunityLinkController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = new CommunityLinksQuery();

        if (request()->exists('popular')) {
            $links = $query->getMostPopular();
        }else if(request()->exists('search')){
            $links = $query->getBySearch(trim(request()->get('search')));
        }else{
            $links = $query->getAll();
        }

        return response()->json(['Links' => $links], 200);
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
                return response()->json(['message' => "Tu link a sido actualizdo"], 201);
            }else{
                return response()->json(['message' => "Tu link ya existe, la actualización tiene que ser revisada por un administrador"], 201);
            }
        }else{
            CommunityLink::create($data);
            if ($approved == 1) {
                return response()->json(['message' => "Tu link a sido publicado"], 201);
            }else{
                return response()->json(['message' => "Tu link tiene que ser revisado por un administrador"], 201);
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
