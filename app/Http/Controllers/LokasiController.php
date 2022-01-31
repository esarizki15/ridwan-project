<?php

namespace App\Http\Controllers;

use App\Lokasi;
use Illuminate\Http\Request;
use File;
class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasis = Lokasi::all();
        return view('lokasi.index', compact('lokasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 'Lokasi stored!';
        $success = true;
        try{
            $lokasi = Lokasi::create($request->except('gambar'));
            if ($request->hasFile('gambar')) {
                $uploaded_image = $request->file('gambar');
                $extension = $uploaded_image->getClientOriginalExtension();
                $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
                $filename = md5(microtime()) . '.' . $extension;
                $uploaded_image->move($destinationPath, $filename);
                $lokasi->gambar = $filename;
            }
            $lokasi->save();

        }catch(\Throwable $e){
            $status = $e->getMessage();
            $success = false;
        }

        return redirect()->route('lokasi.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        return view('lokasi.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'name' => 'required|max:10'
            ]);
        $status = 'lokasi updated!';
        $success = true;
        try{
            $oldFileName = $lokasi->foto;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $lokasi->update($request->except(['gambar']));
            if ($request->hasFile('gambar')) {
                $uploaded_image = $request->file('gambar');
                $extension = $uploaded_image->getClientOriginalExtension();
                $filename = md5(microtime()) . '.' . $extension;
                $uploaded_image->move($destinationPath, $filename);
                $lokasi->gambar = $filename;
            }
            if($lokasi->update()){
                if(File::exists($destinationPath . '/' . $oldFileName)) {
                    File::delete($destinationPath . '/' . $oldFileName);
                }
            }
        }catch(\Throwable $e){
            $status = $e->getMessage();
            $success = false;
        }
        return redirect()->route('lokasi.index')->with('status', $status)->with('success', $success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        $status = 'lokasi deleted!';
        $success = true;
        try {
            $oldFileName = $lokasi->foto;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            if($lokasi->delete()){
                if(File::exists($destinationPath . '/' . $oldFileName)) {
                    File::delete($destinationPath . '/' . $oldFileName);
                }
            }
        }catch(\Throwable $e){
            $status = $e->getMessage();
            $success = false;
        }
        return redirect()->route('lokasi.index')->with('status', $status)->with('success', $success);
    }
}
