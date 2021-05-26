@extends('layouts.app')

@section('content')
<div class="container content-panel forum-list all-topics-list wt-topics">
    <div role="tabpanel" class="tab-pane active" id="topics">
        <div class="card">
            <div class="card-header">Add Discussion</div>

            <div class="card-body">

                <form action="/discussions/{{$discussion->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" name="title" value="{{ $discussion->title }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Contenido</label>
                        <input type="text" class="form-control" id="content" name="content" value="{{ $discussion->content }}">

                    </div>

                    <div class="form-group">
                        <label for="channel">Categoria</label>
                        <select name="channel_id" id="channel_id" class="form-control form_cont" required>

                            <option selected="true" disabled="disabled">channels</option>

                            @foreach($channels as $channel)
                            <option value="{{ $channel->id }}" {{$channel->id == $discussion->channel_id  ? 'selected' : ''}}>{{ $channel->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Editar</button>
                </form>
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