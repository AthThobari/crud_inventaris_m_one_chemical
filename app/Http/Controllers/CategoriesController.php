<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function dashboard()
    {
        $data = categorie::get();
        return view('category.dashboard', compact('data'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = [
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ];
        
        $rules = [
            'kategori' => 'required|unique:categories,name',
            'deskripsi' => 'required',
        ];
        
        $validator = Validator::make($data, $rules);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['name'] = $request->kategori;
        $data['description'] = $request->deskripsi;

        categorie::create($data);

        return redirect()->route('admin.dashboard');
    }

    public function edit(Request $request, $category_id)
    {
        $data = categorie::where('category_id', $category_id)->first();

        return view(
            'category.edit',
            compact('data')
        );
    }

    public function update(Request $request, $category_id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kategori'  => 'required',
                'deskripsi' => 'required',
                
            ]
        );

        if ($validator->fails()) return redirect()->back()->withErrors($validator);

        $data['name'] = $request->kategori;
        
        $data['description'] = $request->deskripsi;
        

        categorie::where('category_id', $category_id)->update($data);

        return redirect()->route('admin.dashboard');
    }

    public function delete(Request $request, $category_id)
    {
        $data = categorie::where('category_id',$category_id)->first();

        if ($data) {
            $data->delete();
        }

        return redirect()->route('admin.dashboard');
    }

}
