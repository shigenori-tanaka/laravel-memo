@extends('layout')

@section('content')
        <h1>メモ一覧</h1>
        
        <!--MemoContorollerから受け取った変数を表示する-->
        <p>{{ $message }}</p>
        
        @include('search')
        <!--Bootstrapのテーブルデザインクラス-->
        <table class="table table-striped table-hover">
        <!--foreachでDBの欲しい情報を一つずつ取得-->
        @foreach($memos as $memo)
            <tr>
                <td>{{ $memo->title }}</td>
                <td>
                    <!--遷移先のルート名を指定。-->
                    <a href= "{{ route('memo_show', ['id'=> $memo->id]) }}" >{{ $memo->body }}</a>
                </td>
                <td>{{ $memo-> created_at }}</td>
            </tr>
        @endforeach
        <div>
            <a href={{ route('memo_new') }}>新規作成</a>
        </div>
@endsection