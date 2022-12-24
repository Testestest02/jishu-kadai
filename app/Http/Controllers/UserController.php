<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Gate;

class UserController extends Controller
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
     * マイアカウント表示
     *  
     * @param Request $request
     * @return Response
     */
    public function myAccount(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return view('user.edit', compact('user'));
    }

    
    //
        /**
     * アカウント一覧
     *  
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        Gate::authorize('isTopAdmin');
        $users = User::orderBy('id', 'asc')->paginate(10);
        return view('user.index', compact('users'));
    }


    /**
     * 編集ページへ遷移
     * 
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        Gate::authorize('isTopAdmin');
        $user = User::find($request->id);
        return view('user.edit', compact('user'));
    }


    /**
     * 編集内容の登録
     * 
     * @param UserFormRequest $request
     * @return Response
     */
    public function update(UserRequest $request)
    {
        $user = User::find($request->id);
        if(Gate::denies('isTopAdmin')){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => Auth::user()->role,
            ]);
            return redirect('/items');
        }elseif(Gate::allows('isTopAdmin')){
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        }
        if(Auth::id() == $user->id && ($user->role == 0||$user->role == 1)){
            return redirect('/items');
            }else{
            return redirect('/user');
        }
    }


    /**
    * 登録情報の削除
    * 
    * @param Request $request
    * @return Response
    */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if(Auth::id() == $user->id){
            $user->delete();
            return redirect('/login');
            }else{
            $user->delete();
            return redirect('/user');
        }
    }
}
