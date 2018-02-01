<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ImpressionController extends Controller
{
    /**
     * ブックリストを表示する
     *  method GET
     * @param  なし
     * @return \Illuminate\Http\Response
     */
    public function index($id){
        if($id == null){

        }else{
            $listImpressions = DB::table('bookimpression')->where('book_id', $id)->paginate(5);
            $objBook = DB::table('book')->where('id', $id)->first();
            return view('impression.index',['impressions' => $listImpressions,'bookName'=>$objBook->name],compact('id'));
        }         
    }

    /**
     * 書籍のコメントを追加、更新する
     * method GET
     * @param  $bookId BookID, $id ImpressionID
     * @return \Illuminate\Http\Response
     */
    public function add($bookId,$id=null){

        if($bookId == null ){            
            return redirect()->route('pageNotFound');
        }else{

            // add new
            if($id == 0){
                return view('impression.add',compact('bookId'));
            }else{

                // update
                $impression = DB::table('bookimpression')->where('id', $id)->first();
                return view('impression.update',['impression' => $impression],compact('id'));
            }
            
        }

        $objImpression = DB::select('select * from impression');
        return view('impression.add',['impressions' => $objImpression],compact('id'));
    }

    /**
     * 書籍のコメントを追加、更新する
     * method POST
     * @param   $bookId BookID, $id ImpressionID
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $iImpressionId = $request->input('impressionId');
        $iBookId = $request->input('bookId');
        $strImpressionName = $request->input('name');

        // update
        if($iImpressionId > 0){
            DB::table('bookimpression')
            ->where('id', $iImpressionId)
            ->update([
                'name' =>$strImpressionName
                ]);
        }else{
            DB::table('bookimpression')->insert([
                'name' =>$strImpressionName,
                'book_id' =>  $iBookId
                ]);
        }

        return redirect()->route('listimpression',[$iBookId]);
    }

    /**
     * 書籍のコメントを削除する
     * method GET
     * @param  $id　BookID
     * @return \Illuminate\Http\Response
     */
    public function delete($bookId,$id=null){
        if($id == null){
             return redirect()->route('pageNotFound');
        }else{
            DB::table('bookimpression')->where('id', '=', $id)->delete();
            return redirect()->route('listimpression',[$bookId]);
        }
    }
}
