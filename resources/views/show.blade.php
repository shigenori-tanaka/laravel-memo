<!--views/layout.blade.phpを読み込む-->
@extends('layout')

<!--layout.blade.phpの@yield('content')とイコール-->
@section('content')
        <h1>メモ一覧</h1>
        
        <!--MemoContorollerから受け取った変数を表示する-->
        <p>{{ $message }}</p>
        <p>タイトル</p>
        <p>{{ $memo -> title }}</p>
        <p>内容</p>
        <p>{{ $memo -> body }}</p>
        <p>作成日</p>
        <p>{{ $memo -> created_at }}</p>
        
        <!--遷移先のルート名を指定する-->
        <p>
                <a href="{{ route('memo_index') }}" class='btn btn-outline-primary'>一覧に戻る</a>
                <a href="{{ route('memo_edit', ["id" =>  $memo->id]) }}" class='btn btn-outline-primary'>編集</a>
        </p>
        <div>
                {{ Form::open(['method' => 'delete', 'route' => ['memo_delete', $memo->id]]) }}
                    {{ Form::submit('削除', ['class' => 'btn btn-outline-secondary']) }}
                {{ Form::close() }}
        </div>
@endsection