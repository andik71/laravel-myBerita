<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthorModel;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

class Author extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = AuthorModel::all()->sortByDesc('id');
        return view('admin.author.list_author', compact('author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.add');
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
            'name' => 'required|max:28',
            'gender' => 'required|max:64',
            'email' => 'required|max:128'
        ]);

        AuthorModel::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
        ]);
        Alert::success('Adding Author Successfuly');
        return redirect('administrator/author');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = AuthorModel::find($id);
        return view('admin.author.detail', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.author.edit', [
            'author' => AuthorModel::find($id),
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
        $findById = AuthorModel::findOrFail($id);
        $request->validate([
            'name' => 'required|max:28',
            'gender' => 'required|max:64',
            'email' => 'required|max:128'
        ]);

        $findById->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email
        ]);
        Alert::success('Update Author Successfuly');
        return redirect('administrator/author');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findById = AuthorModel::findOrFail($id);
        $findById->delete();
        Alert::success('Delete Author Successfuly');
        return redirect('administrator/author');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $author = AuthorModel::all();
        $data = [
            'date' => (date('D, d-M-Y H:i:s')),
            'author' => $author,
        ];

        $pdf = Pdf::loadView('admin.author.report', $data);
        return $pdf->stream('data_author.pdf');
    }
}
