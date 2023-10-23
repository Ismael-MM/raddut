<header>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/post.css') }}">
</header>



@if(count($links) == 0)
<p>Aún no hay contribuciones aprobadas</p>
@endif
@foreach ($links as $link)
<li>
    <a href="{{ $link->link }}" target="_blank">
        {{ $link->title }}
    </a>
    <span class="label label-default" style="background: {{ $link->channel->color }}">
        <a class="text-decoration-none" href="/community/{{ $link->channel->slug }}"> {{ $link->channel->title }}</a>
    </span>
    <form method="POST" action="/votes/{{ $link->id }}">
        {{ csrf_field() }}
        <button type="button" class="btn btn-secondary" {{ Auth::guest() ? 'disabled' : '' }}>
            {{$link->users()->count()}}
        </button>
    </form>
    <small>Contributed by: {{ $link->creator->name }} {{ $link->updated_at->diffForHumans() }}</small>

</li>
@endforeach