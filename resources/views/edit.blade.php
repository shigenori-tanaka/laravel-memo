@extends('layout')

@section('content')
    <h1>paiza bbs</h1>
    <p>{{ $message }}</p>
    {{ Form::model($memo,['route' => ['memo_update', $memo->id]]) }}
        <div class='form-group'>
            {{ Form::label('title', 'title') }}
            {{ Form::text('title', null) }}
        </div>
        <div class='form-group'>
            {{ Form::label('body', 'body') }}
            {{ Form::text('body', null) }}
        </div>
        <div class="form-group">
            {{ Form::submit('保存する', ['class' => 'btn btn-primary']) }}
            <a href='{{ route('memo_show', ['id'=>$memo->id]) }}'>戻る</a>
        </div>
    {{ Form::close() }}
@endsection