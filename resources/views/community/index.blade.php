@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Left colum to show all the links in the DB --}}
        <div class="col-md-8">
            @include('flash-message')
            <h1>Community</h1>
            @if(count($links) == 0)
                <p>Aún no hay contribuciones aprobadas</p>
            @endif
            @foreach ($links as $link)
            <li>
                <a href="{{ $link->link }}" target="_blank">
                    {{ $link->title }}
                </a>
                <span class="label label-default" style="background: {{ $link->channel->color }}">
                    {{ $link->channel->title }}
                </span>
                <small>Contributed by: {{ $link->creator->name }} {{ $link->updated_at->diffForHumans() }}</small>
            </li>
            @endforeach

        </div>
        {{-- Right colum to show the form to upload a link --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3>Contribute a link</h3>
                </div>
                <div class="card-body">
                    @include('add-link')
                </div>
            </div>

        </div>
    </div>
    {{ $links->links() }}
</div>
@stop