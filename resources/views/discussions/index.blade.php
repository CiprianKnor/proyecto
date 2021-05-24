@extends('layouts.app')

@section('content')

<ul>
    @foreach($discussions as $discussion)
    <li class="list-group-item">
        <a href="{{ route('discussions.show', $discussion->slug) }}">
            {{ $discussion->title }}
        </a>
    </li>
    @endforeach

    <div id="hidden_forum" class="hidden">



        <span class="text-block" id="hidden-info"><span id="hidden_forums_count">0</span> <span id="hidden_forums_text" data-i18n="category is being hidden"> category is being hidden</span> · <a title="" data-original-title="" data-toggle="modal" href="#filter-modal" id="modify_forum_filter" data-i18n class="modify_forum_filter">Modify filter</a></span>
    </div>
</ul>

<!--{{ $discussions->appends(['channel' => request()->query('channel') ])->links() }}-->

@endsection