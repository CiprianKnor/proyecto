@extends('layouts.app')

@section('content')

<div class="card">
    @include('partials.discussion-header')

    <div class="card-body">
        <div class="text-center">
            <strong>{{ $discussion->title }}</strong>
        </div>

        <hr>

        {!! $discussion->content !!}
        <div style="display: flex; justify-content:space-between; width:100px; float:right; margin-right:100px;">
            <form action="/discussions/{{ $discussion->id }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class="btn btn-sm" style="color: #676A85; background-color:white; text-decoration:underline;" value="Eliminar">
            </form>
        </div>
        @if($discussion->bestReply)
        <div class="card card-success my-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img width="40px" height="40px" style="border-radius: 50%;" class="mr-2" src="{{ Gravatar::src($discussion->bestReply->owner->email) }}" alt="">
                        <strong>
                            {{ $discussion->bestReply->owner->name }}
                        </strong>
                    </div>
                    <div>
                        <strong>BEST REPLY</strong>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $discussion->bestReply->content !!}
            </div>
        </div>
        @endif
    </div>
</div>

@foreach($discussion->replies()->paginate(3) as $reply)
<div class="card my-5">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div>
                <img width="40px" height="40px" style="border-radius: 50%;" src="{{ Gravatar::src($reply->owner->email) }}" alt="">
                <span>{{ $reply->owner->name }}</span>
            </div>

            <div>
                @auth
                @if(auth()->user()->id === $discussion->user_id)
                <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-info">Mark ad best reply</button>
                </form>
                @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! $reply->content !!}
    </div>
</div>

@endforeach

{{ $discussion->replies()->paginate(3)->links() }}

<div class="card my-5">
    <div class="card-header">
        Add a reply
    </div>

    <div class="card-body">
        @auth
        <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
            @csrf
            <input type="hidden" name="content" id="content">
            <trix-editor input="content"></trix-editor>

            <button type="submit" class="btn btn-sm my-2 btn-success">
                Add reply
            </button>
        </form>
        @else
        <a href="{{ route('login') }}" class="btn btn-info">Sign in to add a reply</a>
        @endauth
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
@endsection