@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('discussions.store') }}" method="post" enctype="multipart/form-data" class="container" style="margin-top:5%;">
            <div class="post-body pull-left container" style="border:1px solid #DFDFDF;">
                <div class="card-header">Añade discusion</div>
                <br>
                @csrf
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" name="title" value="">
                </div>

                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="content">Contenido</label>
                    <input id="content" type="hidden" name="content">
                    <textarea name="content" id="content" cols="1" rows="2" style="width: 100%; resize:none; "></textarea>
                </div>

                <div class="form-group">
                    <input type="file" name="image" id="image" placeholder="choose image">
                </div>

                <div class="form-group">
                    <label for="channel">Categoria</label>
                    <select name="channel" id="channel" class="form-control">
                        @foreach($channels as $channel)
                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success" style="float: right;">Crear</button>
        </form>

    </div>
</div>

@endsection