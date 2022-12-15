@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Edit Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item">Data Author</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Author</h5>

                        <!-- General Form Elements -->
                        <form method="POST" action="{{ url('administrator/author/' . $author->id . '/store') }}">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $author->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email Address</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $author->email }}">
                                    </div>
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input {{ $author->gender != 'P' ? 'checked' : '' }} class="form-check-input"
                                            type="radio" name="gender" id="gridRadios1" value="L">
                                        <label class="form-check-label" for="gridRadios1">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input {{ $author->gender == 'P' ? 'checked' : '' }} class="form-check-input"
                                            type="radio" name="gender" id="gridRadios2" value="P">
                                        <label class="form-check-label" for="gridRadios2">Female</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row mb-2">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10 d-inline">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="bi bi-save me-2"></i>Save</button>
                                    <button type="reset" class="btn btn-warning"><i
                                            class="bi bi-arrow-clockwise me-2"></i>Reset</button>
                                    <a class="btn btn-secondary" href="{{ url('administrator/author') }}"><i
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
