<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kos;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('roles','!=','admin')->get();
        return view('pages.dashboard.user.index', compact('users'));
    }

    public function myProfile()
    {
        $user = Auth::user();
        $jmlKos = Kos::where('user_id', \Auth::user()->id)->count();
        return view('pages.dashboard.user.profile', compact('user','jmlKos'));
    }

    
    public function gantiPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->password = \Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('status','Password berhasil diubah');
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
                
        $request->validate([
            'name' => 'required|min:4',
            'no_hp' => 'required|max:13',
            'alamat' => 'required|max:100|min:3',
            'avatar' => 'image|nullable'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        if($request->hasFile('avatar')){
            if($request->avatar && file_exists(storage_path('app/public/'.$request->avatar))){
                Storage::delete('public/'.$request->avatar);
            }
            $file = $request->file('avatar')->store('avatars','public');
            $user->avatar = $file;
        } 
        $user->save();
        return redirect()->back()->with('status','Profile Anda Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('status','User Berhasil Dihapus');
    }
}
