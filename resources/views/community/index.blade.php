@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        {{-- Left colum to show all the links in the DB --}}
        <div class="col-md-8">
            @include('flash-message')
            <h1>Community</h1>
            @include('links')
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