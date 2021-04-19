@extends('layouts.app')

@section('content')

@foreach($discussions->reverse() as $discussion)

<div class="card my-2">
    <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-sm">
        <div class="text-center">
            <strong>{{ $discussion->title }}</strong>
        </div>
    </a>
</div>

@endforeach

{{ $discussions->appends(['channel' => request()->query('channel') ])->links() }}

@endsection