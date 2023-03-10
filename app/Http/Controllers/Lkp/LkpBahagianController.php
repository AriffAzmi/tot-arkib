<?php

namespace App\Http\Controllers\Lkp;

use App\Http\Controllers\Controller;
use App\Models\LkpBahagian;
use App\Models\LkpUnit;
use Illuminate\Http\Request;

class LkpBahagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $senarai_bahagian = LkpBahagian::query();
        if ($request->exists('carian')) {

            $senarai_bahagian->where('keterangan','LIKE',"%".$request->carian."%");
        }
        $senarai_bahagian = $senarai_bahagian->orderBy('keterangan','asc')->paginate(10);
        // $senarai_bahagian = LkpBahagian::orderBy('keterangan','asc')->paginate(10);
        return view('lkp.bahagian.index', compact('senarai_bahagian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lkp.bahagian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        LkpBahagian::create($request->validate([
            'keterangan' => 'required',
        ]) + [
            'status' => 1,
        ]);

        return redirect()->route('lkp-bahagian.index')->with('success','Maklumat Bahagian Berjaya Disimpan.');
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
    public function edit(LkpBahagian $lkp_bahagian)
    {
        return view('lkp.bahagian.edit',compact('lkp_bahagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LkpBahagian $lkp_bahagian)
    {

        $lkp_bahagian->update($request->validate([
            'keterangan' => ['required'],
            'status' => ['boolean'],
        ]));

        return redirect()->route('lkp-bahagian.index')->with('success','Maklumat bahagian berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LkpBahagian $lkp_bahagian)
    {
        $lkp_bahagian->delete();
        return redirect()->route('lkp-bahagian.index')
        ->with('success','Bahagian telah berjaya dipadam');
    }
}
