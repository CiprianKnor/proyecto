@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container content-panel wt-selectable-rows">
        <div id="posts-list" data-post-order="asc" data-current-page="" data-total-pages="" data-total-posts="">
       

            <div class="col-xs-12 first-post  unSelectableRow">

                <div class="pull-left post-body-wrapper" data-divToolsId="divForumTools">
                    <form id="first_post" method="post" action="/mbactions" name="first_post" data-prevent-ctrl-enter="true">
                        <div id="post_list_1325785074" class="post-body pull-left" data-post-userid="8037844">

                            <span class="post-body-author">

                                <span class="display_name"><a href="/profile/8037844" class='display_username username usergroup1444001' data-toggle="popover" data-placement="bottom">@include('partials.discussion-header')</a></span>


                            </span>
                            <span class="text-muted post-date">
                                <span id="edited_post_date_1325785074" class="edited" data-toggle="tooltip" data-placement="bottom">

                                </span>

                            </span>

                            <h4>
                                <div class="text-center">
                                    <strong>{{ $discussion->title }}</strong>
                                </div>
                                {!! $discussion->content !!}
                                @if($discussion->url)

                                <img src="{{ asset('storage/'.$discussion->url) }}" alt="" style="width: 100%; height:auto;">

                                <form action="/discussions/{{ $discussion->id }}" method="post">

                                    @csrf

                                    @if(auth()->user()->isadmin() == true)
                                    <div class="row" style="float: right;">
                                        <a href="/discussions/{{ $discussion->id }}/edit" class="btn btn-sm" style="color: #676A85; background-color:white; text-decoration:underline; margin-right:5px;">Editar</a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" class="btn btn-sm" style="color: #676A85; background-color:white; text-decoration:underline;" value="Eliminar">
                                    </div>
                                    @endif

                                    @can('read-task', $discussion)
                                    <div class="row" style="float: right;">
                                        <a href="/discussions/{{ $discussion->id }}/edit" class="btn btn-sm" style="color: #676A85; background-color:white; text-decoration:underline;">Editar</a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" class="btn btn-sm" style="color: #676A85; background-color:white; text-decoration:underline;" value="Eliminar">
                                    </div>
                                    @endcan

                                </form>

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

                                @else

                                <form action="/discussions/{{ $discussion->id }}" method="post">

                                    @csrf
                                    @if(!empty($user))


                                    @if(auth()->user()->isadmin() == true)
                                    <div class="row" style="float: right;">
                                        <a href="/discussions/{{ $discussion->id }}/edit" class="btn btn-sm" style="color: #676A85; background-color:white; text-decoration:underline; margin-right:5px;">Editar</a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" class="btn btn-sm" style="color: #676A85; background-color:white; text-decoration:underline;" value="Eliminar">
                                    </div>
                                    @endif

                                    
                                    @endif

                                    @can('read-task', $discussion)
                                    <div class="row" style="float: right;">
                                        <a href="/discussions/{{ $discussion->id }}/edit" class="btn btn-sm" style="color: #676A85; background-color:white; text-decoration:underline; margin-right:5px;">Editar</a>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" class="btn btn-sm" style="color: #676A85; background-color:white; text-decoration:underline;" value="Eliminar">
                                    </div>
                                    @endcan

                                </form>

                                @if($discussion->bestReply)

                                <div class="card card-success my-5" style="margin-top: 10px;">
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

                                @endif
                            </h4>
                        </div>
                    </form>

                    @foreach($discussion->replies()->paginate(3) as $reply)
                    <form id="first_post" method="post" action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply]) }}" name="first_post" data-prevent-ctrl-enter="true">
                        <div id="post_list_1325785074" class="post-body pull-left" data-post-userid="8037844">
                            <div>
                                <img width="40px" height="40px" style="border-radius: 50%;" src="{{ Gravatar::src($reply->owner->email) }}" alt="">
                                <span>{{ $reply->owner->name }}</span>
                            </div>


                            <div>
                                @auth
                                @if(auth()->user()->id === $discussion->user_id)
                                <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info text-md-right" style="float: right;">Marcar como mejor respuesta</button>
                                </form>

                                @endif

                                @endauth

                            </div>
                            <div class="card-body">
                                {!! $reply->content !!}
                            </div>
                        </div>
                    </form>

                    @endforeach



                    <form id="first_post" method="post" action="{{ route('replies.store', $discussion->slug) }}" name="first_post" style="width:50%; float:right;">
                        <div id="post_list_1325785074" class="post-body pull-right" >
                            <div class="card my-5">
                                <div class="card-header">
                                    Add a reply
                                </div>


                                <div class="card-body">
                                    @auth
                                    <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="content" id="content">
                                        <textarea name="content" id="content" cols="1" rows="2" style="width: 100%; resize:none; "></textarea>


                                        <button type="submit" class="btn btn-sm my-2 btn-success" style="float: right;">
                                            Add reply
                                        </button>
                                    </form>

                                    @else

                                    <a href="{{ route('login') }}" class="btn btn-info">Sign in to add a reply</a>

                                    @endauth

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">

@endsection



@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>

@endsection