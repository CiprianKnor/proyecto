@extends('layouts.app')

@section('content')
<div class="container content-panel forum-list all-topics-list wt-topics">
    <div role="tabpanel" class="tab-pane active" id="topics">

        <div class="card">
            <div class="card-header">Add Discussion</div>

            <div class="card-body">

                <form action="{{ route('discussions.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="">
                    </div>

                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="content">Content</label>
                        <input id="content" type="hidden" name="content">
                        <input type="text" name="content">
                    </div>

                    <div class="form-group">
                        <input type="file" name="image" id="image" placeholder="choose image">
                    </div>

                    <div class="form-group">
                        <label for="channel">Channel</label>
                        <select name="channel" id="channel" class="form-control">
                            @foreach($channels as $channel)
                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Create Discussion</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection