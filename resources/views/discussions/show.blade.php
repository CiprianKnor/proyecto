@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container content-panel wt-selectable-rows">
        <div id="posts-list" data-post-order="asc" data-current-page="" data-total-pages="" data-total-posts="">


            <div class="col-xs-12 first-post  unSelectableRow">

                <div class="pull-left post-body-wrapper" data-divToolsId="divForumTools">

                    <div id="" class="post-body pull-left" style="border:1px solid #DFDFDF;">

                        <span class="post-body-author" style="text-align:center;">
                            <span class="display_name"><a class='display_username username'>@include('partials.discussion-header')</a></span>
                        </span>
                        <span class="text-muted post-date">
                            <span class="edited" data-toggle="tooltip" data-placement="bottom">

                            </span>

                        </span>

                        <h4>
                            <div class="text-center">
                                <strong>{{ $discussion->title }}</strong>
                            </div>
                            <br>
                            {!! $discussion->content !!}
                            @if($discussion->url)
                            <br>
                            <br>

                            <img src="{{ asset('storage/'.$discussion->url) }}" alt="" style="max-width: 100%; height:auto;">

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
                                            <strong>MEJOR RESPUESTA</strong>
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

                            @endif
                        </h4>
                    </div>

                    @if($discussion->bestReply)
                    <form id="first_post" method="post">
                        <div id="" class="post-body pull-left" style="border:1px solid #DFDFDF;">
                            <div class="card card-success my-5" style="margin-top: 10px;">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <div style="text-align: center;">
                                            <img width="40px" height="40px" style="border-radius: 50%;" class="mr-2" src="{{ Gravatar::src($discussion->bestReply->owner->email) }}" alt="">
                                            <strong>
                                                {{ $discussion->bestReply->owner->name }}
                                            </strong>
                                        </div>
                                        <div style="text-align: center;">
                                            <strong style="margin-left: 7px;">MEJOR RESPUESTA</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!! $discussion->bestReply->content !!}
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif


                    @foreach($discussion->replies()->paginate(3) as $reply)
                    <form id="first_post" method="post" action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply]) }}" name="first_post" data-prevent-ctrl-enter="true">
                        <div id="" class="post-body pull-left" style="border:1px solid #DFDFDF;">
                            <div style="text-align:center;">
                                <img width="40px" height="40px" style="border-radius: 50%;" src="{{ Gravatar::src($reply->owner->email) }}" alt="">
                                <span>{{ $reply->owner->name }}</span>
                            </div>

                            <br>
                            <div class="card-body" style="margin-left:4px;">
                                {!! $reply->content !!}
                            </div>
                            <br>
                            <div>
                                @auth
                                @if(auth()->user()->id === $discussion->user_id)
                                <form action="{{ route('discussions.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-info text-md-right" style="float: right; ">Marcar como mejor respuesta</button>
                                </form>

                                @endif

                                @endauth

                            </div>
                        </div>
                    </form>

                    @endforeach



                    <form id="first_post" method="post" action="{{ route('replies.store', $discussion->slug) }}" style="width:50%; float:right;">
                        <div id="" class="post-body pull-right" style="border:1px solid #DFDFDF;">
                            <div class="card my-5">
                                <div class="card-header">
                                    Añade una respuesta
                                </div>


                                <div class="card-body">
                                    @auth
                                    <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="content" id="content">
                                        <textarea name="content" id="content" cols="1" rows="2" style="width: 100%; resize:none; "></textarea>

                                        <button type="submit" class="btn btn-sm my-2 btn-success" style="float: right;">
                                            Añadir
                                        </button>
                                    </form>

                                    @else

                                    <a href="{{ route('login') }}" class="btn btn-primary" style="float: right;">Inicia sesion para añadir una respuesta</a>

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