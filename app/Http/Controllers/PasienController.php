<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->role == 'pasien'){
            return redirect()->route('profile.show');
        }
        if($request->has('search')){
            $pasiens = User::where('role', 'pasien')->where('name', 'like', "%{$request->search}%")->paginate(10);
        } else {
            $pasiens = User::where('role', 'pasien')->paginate(10);
        }
        return view('pasien.index', ['pasiens' => $pasiens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'birthday' => 'required|date',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'password' => bcrypt($request->password),
            'role' => 'pasien',
        ]);

        return redirect()->route('pasien.index')->with('status', 'Pasien berhasil ditambahkan');
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
        // update user
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->save();
        return redirect()->back()->with('status', 'Pasien berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete user
        User::destroy($id);
        return redirect()->route('pasien.index')->with('status', 'Pasien berhasil dihapus');
    }
}
