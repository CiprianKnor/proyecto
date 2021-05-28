@extends('layouts.app')

@section('content')

<div class="container content-panel forum-list all-topics-list wt-topics" style="padding-bottom:0px;">
    <div role="tabpanel" class="tab-pane active" id="topics">

        @if(!in_array(request()->path(), ['login', 'register', 'password/email', 'password/reset']))

        @auth
        <a href="{{ route('discussions.create') }}" class="pull-right btn btn-uppercase btn-primary start-new-topic-btn"><span data-i18n>Nueva discusion</span></a>
        @else
        <a href="{{ route('login') }}" class="pull-right btn btn-uppercase btn-primary start-new-topic-btn"><span data-i18n>Inicia sesion para añadir una discusion</span></a>
        @endif
        @else
        <main class="py-4">
            @yield('content')
        </main>
        @endif

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="/latest" aria-controls="topics" role="tab" data-toggle="tab" data-i18n>Discusiones</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel">
                <div class="topics-list">
                    @foreach($discussions as $discussion)
                    <li class="list-group-item">
                        <a href="{{ route('discussions.show', $discussion->slug) }}">
                            {{ $discussion->title }}
                        </a>
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="text-align: right; padding-bottom:0px;">
    {{$discussions->links("pagination::bootstrap-4")}}
</div>

@endsection