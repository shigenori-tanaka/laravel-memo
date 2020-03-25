<?php

namespace App\Http\Controllers;

use App\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // filled():値が有り、空欄かどうか判定する
        if($request->filled('keyword')){
            $keyword = $request->input('keyword');
            $message = "メモ一覧ページです";
            $memos = Memo::where('body', 'like', '%'.$keyword.'%')->get();
            
            
        }else{
            //①viewに渡す値を記述し、変数に代入
            $message = "メモ一覧ページです";
            //②Memoモデルを使ってmemosテーブルから情報を全て取得し、変数に代入
            $memos = Memo::all();
        }
       
        //①、②を第二引数に変数を入れることでviewに渡す準備OK　（compact関数を使用）
        return view('index', compact('message', 'memos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $message = "New Memo";
        return view('new', compact('message'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $memo = new Memo();
        
        $memo->title = $request->title;
        $memo->body = $request->body;
        $memo->save();
        return redirect()->route('memo_show', ['id'=>$memo->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, Memo $memo)
    {
        $message = "詳細画面です";
        $memo = Memo::find($id);
        
        return view('show', compact('message', 'memo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, Memo $memo)
    {
        $message = "メモの編集";
        
        $memo = Memo::find($id);
        return view('edit', compact('message', 'memo'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Memo $memo)
    {
        $memo = Memo::find($id);
        
        $memo->title = $request->title;
        $memo->body = $request->body;
        $memo->save();
        return redirect()->route('memo_show', ['id'=>$memo->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id, Memo $memo)
    {
        $memo = Memo::find($id);
        $memo->delete();
        return redirect('index');
        
    }
}
