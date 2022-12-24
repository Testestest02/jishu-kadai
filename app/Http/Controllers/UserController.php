<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //
        /**
     * アカウント一覧
     *  
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
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
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        if(Auth::id() == $user->id && $user->role == 0){
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
