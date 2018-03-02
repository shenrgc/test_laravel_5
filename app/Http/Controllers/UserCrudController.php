<?php

namespace App\Http\Controllers;

use App\UserCrud;
use Illuminate\Http\Request;

class UserCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserCrud::all();
        return view('users.index',compact('users',$users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
        ]);

        $user = UserCrud::create(['name' => $request->name,'email' => $request->email]);
        return redirect('/users/'.$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserCrud  $userCrud
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = UserCrud::findOrFail($id);
        return view('users.show',compact('user',$user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserCrud  $userCrud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = UserCrud::findOrFail($id);
        return view('users.edit',compact('user',$user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserCrud  $userCrud
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $user = UserCrud::findOrFail($id);

        //Validate
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
        ]);

        $input = $request->all();

        $user->fill($input)->save();

        $request->session()->flash('message', 'Successfully modified the user!');
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserCrud  $userCrud
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = UserCrud::findOrFail($id);

        $user->delete();

        $request->session()->flash('message', 'Successfully deleted the user!');
        return redirect('users');
    }
}
