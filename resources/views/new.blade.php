@extends('layout')

@section('content')
    <h1>paiza bbs</h1>
    <p>{{ $message }}</p>
    {{ Form::open(['route' => 'memo_store']) }}
        <div class='form-group'>
            {{ Form::label('title', 'title') }}
            {{ Form::text('title', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('body', 'body') }}
            {{ Form::text('body', null) }}
        </div>
        <div class="form-group">
            {{ Form::submit('作成する', ['class' => 'btn btn-primary']) }}
            <a href={{ route('memo_index') }}>一覧に戻る</a>
        </div>
    {{ Form::close() }}
@endsection