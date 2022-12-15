@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Add Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item">Data Article</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Article</h5>

                        <!-- General Form Elements -->
                        <form enctype="multipart/form-data" method="POST" action="{{ url('administrator/article/store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-chat-square-quote-fill"></i></span>
                                        <input type="text" name="title" class="form-control">
                                    </div>  
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="formFile" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-6">
                                        <div class="input-group">
                                            <input type="file" name="photo" class="form-control" id="formFile">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Content</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <textarea type="text" name="content" rows="6" class="form-control" id="inputText"></textarea>
                                            <script>
                                                CKEDITOR.replace( 'content' );
                                        </script>
                                        </div>
                                    </div>
                                </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Author</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text" ><i class="bi bi-person-fill"></i></span>
                                        <select class="form-select" name="author_id" aria-selected="Select Author">
                                            <option selected>-- Select Author --</option>
                                            @foreach ($author as $row)
                                                <option value="{{ $row->id }}"> {{ $row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text" ><i class="bi bi-tag-fill"></i></span>
                                        <select class="form-select" name="category_id" aria-selected="Select Category">
                                            <option selected>-- Select Category --</option>
                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}"> {{ $row->category}}</option>
                                            @endforeach
                                        </select>
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


