@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Edit Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item">Data Category</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Category</h5>

                        <!-- General Form Elements -->
                        <form method="POST" action="{{ url('administrator/category/' . $category->id . '/update') }}">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-bookmark"></i></span>
                                        <input type="text" name="category" class="form-control" id="inputText" value="{{ $category->category }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="inputText" class="col-sm-2 col-form-label">Tags</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-tags"></i></span>
                                        <input type="text" name="tags" class="form-control" value="{{ $category->tags }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 d-inline">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="bi bi-save me-2"></i>Save</button>
                                    <button type="reset" class="btn btn-warning"><i
                                            class="bi bi-arrow-clockwise me-2"></i>Reset</button>
                                    <a class="btn btn-secondary" href="{{ url('administrator/category') }}"><i
                                            class="bi bi-arrow-left-square me-2"></i>Return</a>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
