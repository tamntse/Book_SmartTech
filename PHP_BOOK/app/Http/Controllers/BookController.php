<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BookController extends Controller
{
    /**
     * ブックリストを表示する
     *  method GET
     * @param  なし
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $books = DB::table('book')->paginate(5);
        return view('book.index',['books' => $books]);
    }

    /**
     * 書籍の情報を編集する
     * method GET
     * @param  $id　BookID
     * @return \Illuminate\Http\Response
     */
    public function add($id=null){
        if($id == null){
            return view('book.add');
        }else{
            $book = DB::table('book')->where('id', $id)->first();
            return view('book.update',['book' => $book],compact('id'));
        }

        $books = DB::select('select * from book');
        return view('book.add',['books' => $books],compact('id'));
    }


    /**
     * ブック情報
     * method POST
     * @param  $id　BookID
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $iBookId = $request->input('id');
        $strBookName = $request->input('name');
        $strBookPublisher = $request->input('publisher');
        $iBookPage = $request->input('page');

        if($strBookName == null || $strBookPublisher == null ){
            
        }

        // update
        if($iBookId > 0){
            DB::table('book')
            ->where('id', $iBookId)
            ->update([
                'name' =>$strBookName,
                'publisher' =>  $strBookPublisher,
                'page' =>  $iBookPage
                ]);
        }else{
            DB::table('book')->insert([
                'name' =>$strBookName,
                'publisher' =>  $strBookPublisher,
                'page' =>  $iBookPage
                ]);
        }

        return redirect()->route('listbook');
    }

    /**
     * 書籍情報を削除する
     * method GET
     * @param  $id　BookID
     * @return \Illuminate\Http\Response
     */
    public function delete($id=null){
        if($id == null){
            return view('book.add');
        }else{
            DB::table('book')->where('id', '=', $id)->delete();
            return redirect()->route('listbook');
        }
    }
}
