<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Barryvdh\DomPDF\Facade\PDF;
use RealRashid\SweetAlert\Facades\Alert;

class Category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $category = CategoryModel::all()->sortByDesc('id');
        return view('admin.category.list_category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Success
    {
        $request->validate([
            'category' => 'required|max:28',
            'tags' => 'required|max:28',
        ]);

        CategoryModel::create([
            'category' => $request->category,
            'tags' => $request->tags,
        ]);

        Alert::success('Add Category Successfuly');
        return redirect('administrator/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = CategoryModel::all()->where('id', $id)->first();
        return view('admin.category.detail', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.category.edit', [
            'category' => CategoryModel::find($id),
        ]);
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
        $findById = CategoryModel::findOrFail($id);
        $request->validate([
            'category' => 'required|max:24',
            'tags' => 'required|max:68',
        ]);

        $findById->update([
            'category' => $request->category,
            'tags' => $request->tags,
        ]);

        Alert::success('Update Category Successfuly');
        return redirect('administrator/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findById = CategoryModel::findOrFail($id);
        $findById->delete();

        Alert::success('Delete Category Successfuly');
        
        return redirect('administrator/category');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $category = CategoryModel::all();
        $data = [
            'date' => date('D, d-M-Y H:i:s'),
            'category' => $category,
        ];

        $pdf = PDF::loadView('admin.category.report', $data);
        return $pdf->stream('data_category.pdf');
    }
}
