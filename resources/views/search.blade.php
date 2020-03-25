<!--{{ Form::open() }}のデフォルトでの中身-->
<!--<form method="POST" action="現在のURL" accept-charset="UTF-8">-->
<!--<input name="_token" type="hidden" value="somelongrandom string">-->
<!--今回はgetを指定しているため <form method="GET" action="現在のURL" accept-charset="UTF-8"> -->
{{ Form::open(['method' => 'get']) }}
    {{ csrf_field() }}
    <div class='form-group'>
        <!--下記2行のForm::記述の意味-->
        <!--<label for="keyword">キーワード検索</lavel>-->
        <!--<input type="text" name="keyword" id="keyword" class="form-control"> (nullはフィールドの初期値を表す）-->
        {{ Form::label('keyword', 'キーワード検索:') }}
        {{ Form::text('keyword', null, ['class' => 'form-control']) }}
    </div>
    <div class='form-group'>
        {{ Form::submit('検索', ['class' => 'btn btn-outline-primary'])}}
        <a href={{ route('memo_index') }}>クリア</a>
    </div>
<!--Form::openに対しForm::closeで閉じている？-->
{{ Form::close() }}