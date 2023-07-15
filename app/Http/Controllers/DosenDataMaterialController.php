<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;


class DosenDataMaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('dosen/dosen_data_material', compact(['materials']));
    }
    public function edit(Request $request, $id)
    {
        $material = Material::find($id);
        return view('dosen.dosen_data_material_edit', compact(['material']));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'is_exam' => 'required',
            'order' => 'required',
        ]);

        $material = Material::find($id);

        $material->name = $request->get('name');
        $material->description = $request->get('description');
        $material->is_exam = $request->get('is_exam');
        $material->path = $request->get('path');
        $material->order = $request->get('order');

        $material->save();

        return to_route('dosen_data_material');
    }
    public function create()
    {
        $material = Material::all();
        return view('dosen.dosen_data_material_create', compact(['material']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'is_exam' => 'required',
            'order' => 'required',
        ]);

        Material::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'is_exam' => $request->get('is_exam'),
            'path' => $request->get('path'),
            'order' => $request->get('order'),
        ]);

        return to_route('dosen_data_material');
    }

    public function delete(Request $request, $id)
    {
        Material::find($id)->delete();
        return to_route('dosen_data_material');
    }
}
