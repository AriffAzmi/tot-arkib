<?php

namespace App\Http\Controllers\Lkp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LkpSeksyen;
use App\Models\LkpBahagian;

class LkpSeksyenController extends Controller
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
        $senarai_seksyen = LkpSeksyen::query();
        if ($request->exists('carian')) {

            $senarai_seksyen->where('keterangan','LIKE',"%".$request->carian."%");
        }
        $senarai_seksyen = $senarai_seksyen
        ->with('bahagian')
        ->orderBy('keterangan','asc')->paginate(10);
        // $senarai_bahagian = LkpBahagian::orderBy('keterangan','asc')->paginate(10);
        return view('lkp.seksyen.index', compact('senarai_seksyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lkp_bahagian = LkpBahagian::all();
        return view('lkp.seksyen.create',compact('lkp_bahagian'));
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
            'lkp_bahagian_id' => 'required',
            'keterangan' => 'required',
        ]);

        try {

            LkpSeksyen::create([
                'lkp_bahagian_id' => $request->lkp_bahagian_id,
                'keterangan' => $request->keterangan,
                'status' => 1,
            ]);

            return redirect()->route('lkp-seksyen.index')->with('success','Maklumat Seksyen Berjaya Disimpan.');

        } catch (\Exception $e) {
            return redirect()->route('lkp-seksyen.index')->with('error','Maklumat Seksyen Tidak Berjaya Disimpan. ::'.$e->getMessage());
        }
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
    public function edit(LkpSeksyen $lkp_seksyen)
    {
        $lkp_bahagian = LkpBahagian::all();
        return view('lkp.seksyen.edit',compact('lkp_seksyen','lkp_bahagian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LkpSeksyen $lkp_seksyen)
    {
        $this->validate($request,[
            'lkp_bahagian_id' => 'required',
            'keterangan' => 'required',
            'status' => 'boolean'
        ]);

        try {

            $lkp_seksyen->update([
                'lkp_bahagian_id' => $request->lkp_bahagian_id,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
            ]);

            return redirect()->route('lkp-seksyen.index')->with('success','Maklumat Seksyen Berjaya Dikemaskini.');

        } catch (\Exception $e) {
            return redirect()->route('lkp-seksyen.index')->with('error','Maklumat Seksyen Tidak Berjaya Dikemaskini. ::'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LkpSeksyen $lkp_seksyen)
    {
        $lkp_seksyen->delete();
        return redirect()->route('lkp-seksyen.index')
        ->with('success','Seksyen telah berjaya dipadam');
    }
}
