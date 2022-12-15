<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\AuthorModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;

class Article extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = ArticleModel::all()->sortByDesc('id');
        return view('admin.article.list_article', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryModel::all();
        $author = AuthorModel::all();

        return view('admin.article.add', compact('category', 'author'));
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
            'title' => 'required|max:64',
            'content' => 'required|max:2084',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'author_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        $data = [
            'title' => str($request->title)->title(),
            'content' => $request->content,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id
        ];

        if (request()->file('photo')) {
            $data['photo'] = request()->file('photo')->store('admin/resource', 'public');
        };

        ArticleModel::create($data);
        Alert::success('Add Article Successfuly');
        return redirect('administrator/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $author = AuthorModel::all()->where('id', $id)->first();
        $category = CategoryModel::all();
        $author = AuthorModel::all();
        $article = ArticleModel::findOrFail($id);
        return view('admin.article.detail', compact('category', 'author', 'article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoryModel::all();
        $author = AuthorModel::all();
        $article = ArticleModel::findOrFail($id);

        return view('admin.article.edit', compact('category', 'author', 'article'));
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
        $findById = ArticleModel::findOrFail($id);
        $request->validate([
            'title' => 'required|max:64',
            'content' => 'required|max:2084',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'author_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        $data = [
            'title' => str($request->title)->title(),
            'content' => $request->content,
            'author_id' => $request->author_id,
            'category_id' => $request->category_id
        ];

        if (request()->file('photo')) {
            Storage::disk('public')->delete($findById->photo);
            $data['photo'] = request()->file('photo')->store('admin/resource', 'public');
        }

        $findById->update($data);
        Alert::success('Update Author Successfuly');
        return redirect('administrator/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findById = ArticleModel::findOrFail($id);
        Storage::disk('public')->delete($findById->photo);
        $findById->delete();

        Alert::success('Delete Article Successfuly');
        return redirect('administrator/article');
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $article = ArticleModel::all();
        $data = [
            'date' => date('D, d-M-Y H:i:s'),
            'article' => $article,
        ];

        $pdf = PDF::loadView('admin.article.report', $data);
        return $pdf->stream('data_article.pdf');
    }
}
