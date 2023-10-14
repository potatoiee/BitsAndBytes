<?php

namespace App\Http\Controllers;

use App\Models\rc;
use Illuminate\Http\Request;
use App\Models\User;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);

        return view('users.index', ['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users = User::create($request->all());

        if($users){
            return redirect()->back()->with('User Created Succesfully');
        }
        return redirect()->back()->with('User is not Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        if (!$users){
            return back()->with('Error', 'User not found');
        }
        $users->update($request->all());
        return back()->with('Success', 'User Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $users = User::find($id);
        if (!$users){
            return back()->with('Error', 'User not found');
        }
        $users->delete();
        return back()->with('Success', 'User Deleted Succesfully');
    }
}
