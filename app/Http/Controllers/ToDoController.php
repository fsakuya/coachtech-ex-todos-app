<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Todo::all();
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        // // 新規のToDoモデルを作成する
        $toDo = new Todo();

        // // タイトルをToDoモデルに設定する
        $toDo->title = $request->get('title');

        // // DBにデータを登録する
        $toDo->save();

        // dd($toDo);

        //リダイレクト
        return redirect('/todos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        // IDに紐づくToDoモデルを取得する
        $toDo = ToDo::find($id);

        // タイトルをToDoモデルに設定する
        $toDo->title = $request->get('title');

        // ToDoデータベースを更新する
        $toDo->save();

        // dd($toDo);

        //リダイレクト
        return redirect('/todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toDo = Todo::find($id);

        $toDo->delete();

        return redirect('/todos');
    }
}
