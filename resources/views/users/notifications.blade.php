@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('discussions.store') }}" method="post" enctype="multipart/form-data" class="container" style="margin-top:5%;">
            <div class="post-body pull-left container" style="border:1px solid #DFDFDF;">
                <div class="card">
                    <div class="card-header">Notificaciones</div>

                    <div class="card-body">

                        @foreach($notifications as $notification)
                        <li class="list-group-item">
                            @if($notification->type === 'App\Notifications\NewReplyAdded')
                            Alguien te ha respondido a

                            <strong>{{ $notification->data['discussion']['title'] }}</strong>
                            <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}" class="btn btn-sm btn-info float-right" style="color: white;">
                                Ver discusion
                            </a>
                            @endif
                            @if($notification->type === 'App\Notifications\ReplyMarkedAsBestReply')
                            Tu respuesta a <strong>{{ $notification->data['discussion']['title'] }}</strong> se ha marcado como mejor respuesta
                            <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}" class="btn btn-sm btn-info float-right" style="color: white;">
                                Ver discusion
                            </a>
                            @endif
                        </li>
                        @endforeach


                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container" style="text-align: right;">
        {{$notifications->links("pagination::bootstrap-4")}}
    </div>
</div>

@endsection