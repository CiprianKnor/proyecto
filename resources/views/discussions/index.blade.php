@extends('layouts.app')

@section('content')

<div class="container content-panel forum-list all-topics-list wt-topics">
    <div role="tabpanel" class="tab-pane active" id="topics">

        <a href="/post/printadd" class="pull-right btn btn-uppercase btn-primary start-new-topic-btn signupLogin"><span data-i18n>New Topic</span>
        </a>

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="/latest" aria-controls="topics" role="tab" data-toggle="tab" data-i18n>Topics</a></li>
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

<!--{{ $discussions->appends(['channel' => request()->query('channel') ])->links() }}-->

@endsection