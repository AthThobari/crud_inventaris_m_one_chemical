<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class homecontroller extends Controller
{


    public function index()
    {

        $data = data::get();

        return view('index', compact('data'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'foto' => 'required|mimes:jpg,png,jpeg|max:2048',
                'nama_barang' => 'required',
                'kategori'  => 'required',
                'stok' => 'required|integer',
            ]
        );

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $photo = $request->file('foto');
        $filename = date('Y-m-d') . $photo->getClientOriginalName();
        $path = 'photo-user/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($photo));

        $data['nama_barang'] = $request->nama_barang;
        $data['kategori'] = $request->kategori;
        $data['stok'] = $request->stok;
        $data['image'] = $filename;

        data::create($data);

        return redirect()->route('admin.index');
    }

    public function edit(Request $request, $id)
    {
        $data = data::find($id);

        return view(
            'edit',
            compact('data')
        );

        // return view('edit');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_barang' => 'required',
                'kategori'  => 'nullable',
                'stok'  => 'required|integer',
                'foto'  => 'nullable',
                
            ]
        );

        if ($validator->fails()) return redirect()->back()->withErrors($validator);
        if ($request->foto) {
            $photo     = $request->file('foto');
            $filename  = date('Y-m-d').$photo->getClientOriginalName();
            $path      = 'photo-user/'.$filename;
            Storage::disk('public')->put($path,file_get_contents($photo));

            $data['image']    = $filename;
        }

        $data['nama_barang'] = $request->nama_barang;
        
        if ($request->kategori) {
            $data['kategori'] = $request->kategori;
        }
        $data['stok'] = $request->stok;
        

        data::whereId($id)->update($data);

        return redirect()->route('admin.index');
    }

    public function delete(Request $request, $id)
    {
        $data = data::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('admin.index');
    }
}
