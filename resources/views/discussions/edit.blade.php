@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="/discussions/{{$discussion->id}}" method="post" enctype="multipart/form-data" class="container" style="margin-top:5%;">
            <div class="post-body pull-left container">
                <div class="card-header">Edita la discusión</div>
                <br>
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

                <button type="submit" class="btn btn-success" style="float: right;">Editar</button>
        </form>

    </div>
</div>

@endsection