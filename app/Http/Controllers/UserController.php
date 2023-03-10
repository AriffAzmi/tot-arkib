<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $senarai_pengguna = User::query();
        if ($request->exists('carian')) {

            $senarai_pengguna->where('name','LIKE',"%".$request->carian."%");
        }
        $senarai_pengguna = $senarai_pengguna
        ->with('permissions')
        ->orderBy('name','asc')->paginate(10);

        return view('user.index', compact('senarai_pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all()->pluck('name');

        return view('user.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required|email',
            'peranan' => 'required',
        ]);

        try {

            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'status' => 1,
                'password' => bcrypt("rahsia"),
            ]);

            foreach ($request->peranan as $p) {

                $user->givePermissionTo($p);
            }

            return redirect()->route('pengguna.index')->with('success','Maklumat Pengguna Berjaya Disimpan.');
        } catch (\Exception $e) {

            return redirect()->route('pengguna.index')->with('error','Maklumat Pengguna Tidak Berjaya Disimpan. ::'.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pengguna)
    {
        $permissions = Permission::all()->pluck('name');
        return view('user.edit',compact('pengguna','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pengguna)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required|email',
            'status' => 'boolean',
        ]);

        try {

            $updatePengguna = [];
            if(strlen($request->password) > 0) {
                $updatePengguna = [
                    'name' => $request->nama,
                    'email' => $request->email,
                    'status' => $request->status,
                    'password' => bcrypt($request->password)
                ];
            }
            else {
                $updatePengguna = [
                    'name' => $request->nama,
                    'email' => $request->email,
                    'status' => $request->status
                ];
            }
            $pengguna->update($updatePengguna);
            $pengguna->syncPermissions($request->peranan);

            return redirect()->route('pengguna.index')->with('success','Maklumat Pengguna Berjaya Dikemaskini.');
        } catch (\Exception $e) {

            return redirect()->route('pengguna.index')->with('error','Maklumat Pengguna Tidak Berjaya Dikemaskini. ::'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna.index')
        ->with('success','Pengguna telah berjaya dipadam');
    }
}
