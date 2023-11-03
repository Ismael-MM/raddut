<?php

namespace App\Queries;
use App\Models\Channel;
use App\Models\CommunityLink;

class CommunityLinksQuery
{
    public function getByChannel(Channel $channel)
    {
        $query = $channel->CommunityLinks()->where('approved', true)->latest('updated_at')->paginate(25);
        return $query;
    }

    public function getByChannelPopular(Channel $channel)
    {
        $query = $channel->CommunityLinks()->where('approved', true)->withCount('users')->orderBy('users_count', 'desc')->paginate(5);
        return $query;
    }

    public function getBySearch($search)
    {  
        $palabras = explode(" ",$search);
        if (count($palabras) >= 2) {
            $query = CommunityLink::where('approved', true)
        ->where('title', 'like', '%'.$palabras[0].'%')
        ->orWhere('title', 'like', '%'.$palabras[1].'%')
        ->latest('updated_at')->paginate(25);
        }else{
            $query = CommunityLink::where('approved', true)
            ->where('title', 'like', '%'.$search.'%')
            ->latest('updated_at')->paginate(25);
        }
        return $query;
    }

    public function getAll()
    {
        $query = CommunityLink::where('approved', true)->latest('updated_at')->paginate(25);
        return $query;
    }

    public function getMostPopular()
    {
        $query = CommunityLink::where('approved', true)->withCount('users')->orderBy('users_count', 'desc')->paginate(5);
        return $query;
    }
}
