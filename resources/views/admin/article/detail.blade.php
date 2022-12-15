@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Preview Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item">Data Article</li>
                <li class="breadcrumb-item active">Preview</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Preview Article</h5>

                        <!-- General Form Elements -->
                        <form enctype="multipart/form-data" method="POST"
                            action="{{ url('administrator/article/' . $article->id . '/show') }}">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <h2 class="fw-bold">{{ $article->title }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="formFile" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-3">
                                    <img src="{{ url('storage') }}/{{ $article->photo }}" alt="image" class="img-fluid">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div rows="6" id="inputText">{!! $article->content !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Author</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <p class="fw-bold">{{ $article->author->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <p class="fw-bold">{{ $article->category->category }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 d-inline">
                                    <a class="btn btn-secondary" href="{{ url('administrator/article') }}"><i
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
