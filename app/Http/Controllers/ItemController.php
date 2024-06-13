<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\image;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ItemController extends Controller

{
    public function index(Request $request, $category_id)
    {
        $category = categorie::where('category_id', $category_id)->first();

        $data = item::where('category_id', $category_id)->get(); // Menggunakan get() untuk mendapatkan semua data item
        $imageIds = $data->pluck('item_id'); // Mengambil semua item_id dari data item
    
        $images = image::whereIn('item_id', $imageIds)->get(); // Mendapatkan semua data gambar berdasarkan item_id
    
        return view('item.index', compact('data', 'images', 'category')); // Mengirim data gambar ke tampilan
    }

    public function create(Request $request, $category_id)
    {
        return view('item.create', compact('category_id'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'foto' => 'required|mimes:jpg,png,jpeg|max:2048',
                'nama_barang' => 'required',
                'deskripsi'  => 'required',
                'stok' => 'required|integer',
                'harga' => 'required|numeric|max:1000000',
            ]
        );

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $category_id = $request->category_id;

        $photo = $request->file('foto');
        $filename = date('Y-m-d') . $photo->getClientOriginalName();
        $path = 'photo-user/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($photo));

        $data['name'] = $request->nama_barang;
        $data['description'] = $request->deskripsi;
        $data['quantity'] = $request->stok;
        $data['price'] = $request->harga;
        $data['category_id'] = $category_id;

        $data = item::create($data);

        $image['image_url'] = $filename;
        $image['item_id'] = $data->id;
        $image = image::create($image);

        return redirect()->route('admin.index.item', ['category_id' => $category_id]);
    }

    public function edit(Request $request, $item_id)
    {
        $data = item::where('item_id',$item_id)->first();

        return view(
            'item.edit',
            compact('data')
        );

        // return view('edit');
    }

    public function update(Request $request, $item_id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'foto' => 'nullable|mimes:jpg,png,jpeg|max:2048',
                'nama_barang' => 'required',
                'deskripsi'  => 'required',
                'stok' => 'required|integer',
                'harga' => 'required',
            ]
        );

        if ($validator->fails()) return redirect()->back()->withErrors($validator);
        if ($request->foto) {
            $photo     = $request->file('foto');
            $filename  = date('Y-m-d') . $photo->getClientOriginalName();
            $path      = 'photo-user/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($photo));

            $image['image_url']    = $filename;
        image::where('item_id',$item_id)->update($image);
        }

        $data['name'] = $request->nama_barang;
        $data['description'] = $request->deskripsi;

        $data['quantity'] = $request->stok;
        $data['price'] = $request->harga;


        item::where('item_id',$item_id)->update($data);
        
        return redirect()->route('admin.dashboard');
    }

    public function delete(Request $request, $item_id)
    {

        item::where('item_id', $item_id)->delete();
        image::where('item_id', $item_id)->delete();


        return redirect()->route('admin.dashboard');
    }
}
