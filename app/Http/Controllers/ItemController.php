<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Point;
use App\Models\Size;
use App\Models\Review;
use \Gate;


class ItemController extends Controller
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
     * 商品一覧
     */
    public function index()
    {
        if ( Gate::allows('isGeneral')){
        // 商品一覧取得
        $items = Item::where('items.status', 'active')->select()->get();
        }else{
            $items = Item::all();
        };

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録ページへ遷移
     */
    public function add(Request $request)
    {
        Gate::authorize('isAdmin');
        $points = Point::all();
        $sizes = Size::all();

        return view('item.add', compact('points', 'sizes'));
    }

    /**
     * 商品登録
     */
    public function addIn(ItemRequest $request)
    {
        Gate::authorize('isAdmin');
        $item = Item::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'status' => $request->status,
            'type' => $request->type,
            'sex' => $request->sex,
            'max' => $request->max,
        ]);
        $item->points()->sync($request->points);
        $item->sizes()->sync($request->sizes);
        return redirect('/items');
        }

    /**
     * 詳細ページへ遷移
     * 
     * @param Request $request
     * @return Response
     */
    public function detail(Request $request)
    {
        $item = Item::find($request->id);
        $points = Point::all();
        $sizes = Size::all();
        $reviews = Review::get();
        $user = Auth::user();

        return view('item.detail', compact('item', 'points', 'sizes', 'reviews', 'user'));
    }

    /**
     * 編集ページへ遷移
     * 
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        Gate::authorize('isAdmin');
        $item = Item::find($request->id);
        $points = Point::all();
        $sizes = Size::all();

        return view('item.edit', compact('item', 'points', 'sizes'));
    }

    /**
     * 編集内容の登録
     * 
     * @param Request $request
     * @return Response
     */
    public function update(ItemRequest $request)
    {
        Gate::authorize('isAdmin');
        $item = Item::find($request->id);
        $item->update([
            'name' => $request->name,
            'status' => $request->status,
            'type' => $request->type,
            'sex' => $request->sex,
            'max' => $request->max,
        ]);
        $item->sizes()->sync($request->sizes);
        $item->points()->sync($request->points);

        return redirect('/items');
    }

    /**
    * 商品の削除
    * 
    * @param Request $request
    * @return Response
    */
    public function destroy(Request $request)
    {
        Gate::authorize('isAdmin');
        $item = Item::find($request->id);
        $item->delete();

        return redirect('/items');
    }

    /**
     * レビューページへ遷移
     * 
     * @param Request $request
     * @return Response
     */
    public function review(Request $request)
    {
        $item = Item::find($request->id);

        return view('item.review', compact('item'));
    }

    /**
     * レビュー内容の登録
     * 
     * @param Request $request
     * @return Response
     */
    public function post(ReviewRequest $request)
    {
        $review = Review::create([
            'user_id' => Auth::user()->id,
            'item_id' => $request->id,
            'name' => $request->name,
            'score' => $request->score,
            'comment' => $request->comment,
        ]);
        return redirect()->route('items.detail', ['id' => $review->item_id]);
    }

    /**
     * レビュー編集ページへ遷移
     */
    public function reviewEdit(Request $request)
    {
        $review = Review::find($request->id);
        if ( Gate::allows('isTopAdmin') || $review->user_id == Auth::id()){
            $item = Item::find($review->item_id);
            return view('item.reviwEdit', compact('review', 'item'));
        }
        return redirect('/items');
    }

    /**
     * レビュー編集の登録
     * 
     * @param Request $request
     * @return Response
     */
    public function reviewUpdate(ReviewRequest $request)
    {
        $review = Review::find($request->id);
        if ( Gate::allows('isTopAdmin') || $review->user_id == Auth::id()){
        $review->update([
            'name' => $request->name,
            'score' => $request->score,
            'comment' => $request->comment,
            'reply' => $request->reply
        ]);
    }
        return redirect()->route('items.detail', ['id' => $review->item_id]);
    }

    /**
    * レビューの削除
    * 
    * @param Request $request
    * @return Response
    */
    public function destroyReview(Request $request)
    {
        $review = Review::find($request->id);
        if ( Gate::allows('isTopAdmin') || $review->user_id == Auth::id()){

        $review->delete();
        }
        return redirect()->route('items.detail', ['id' => $review->item_id]);
    }

}
