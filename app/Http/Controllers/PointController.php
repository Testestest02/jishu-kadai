<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PointRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Point;

class PointController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品特長一覧
     *  
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // 商品特長一覧取得
        //なぜこれでできないのか？
        // $points = Point::orderBy('id', 'asc');
        $points = Point::all();
        $items = Item::all();
        return view('point.index', compact('points', 'items'));
    }

    /**
     * 特長登録ページへ遷移
     */
    public function add(Request $request)
    {

        return view('point.add');
    }

    /**
     * 特長登録
     */
    public function addIn(PointRequest $request)
    {
        Point::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'detailA' => $request->detailA,
            'detailB' => $request->detailB,
            'detailC' => $request->detailC,
        ]);
        
        return redirect('/point');
    }

        /**
     * 商品特長編集ページへ遷移
     * 
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        $point = Point::find($request->id);
        return view('point.edit', compact('point'));
    }

    /**
     * 編集内容の登録
     * 
     * @param Request $request
     * @return Response
     */
    public function update(PointRequest $request)
    {
        $item = Point::find($request->id);
        $item->update([
            'name' => $request->name,
            'detailA' => $request->detailA,
            'detailB' => $request->detailB,
            'detailC' => $request->detailC,
        ]);
        // dd($item->points());
        return redirect('/point');
    }

    

    /**
    * 商品特長の削除
    * 
    * @param Request $request
    * @return Response
    */
    public function destroy(Request $request)
    {
        $point = Point::find($request->id);
            $point->delete();
            return redirect('/point');
        }

}
