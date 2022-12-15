@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Author Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Data Article</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Article Lists</h5>

                        <div class="tombol">
                            <a class="btn btn-sm btn-primary mb-2 me-1" href="{{ url('administrator/article/add') }}"><i
                                    class="bi bi-plus-lg"></i>Add Data</a>
                            <a class="btn btn-sm btn-danger mb-2 me-1" href="{{ url('administrator/article/report') }}"><i
                                    class="bi bi-file-earmark-pdf-fill"></i>PDF Report</a>
                        </div>

                        <!-- Article Table -->
                        <table class="table table-hover table-bordered responsive nowarp" id="mytable" width="100%">
                            <thead class="bg-light text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Author Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($article as $row)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row->title }}</td>
                                        <td class="text-muted">{{ str($row->title)->slug() }}</td>
                                        <td>
                                            <img src="{{ url('storage')}}/{{$row->photo}}" width="100px" alt="image" class="img-thumbnail">
                                        </td>
                                        <td>{{ $row->content }}</td>
                                        <td>{{ $row->author->name }}</td>
                                        <td class="text-muted">{{ $row->category->category }}</td>
                                        <td class="text-muted text-center">{{ $row->category->tags }}</td>
                                        <td class="text-center">
                                            <form class="d-inline"
                                                action="{{ url('administrator/article/' . $row->id . '/delete') }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="{{ $row->id }}">
                                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                                <br>
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ url('administrator/article/' . $row->id . '/edit') }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <br>
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ url('administrator/article/' . $row->id . '/detail') }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Article -->
                    </div>
                </div>

            </div>
    </section>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#mytable').DataTable({
                responsive: true,
            });
        });
        
    </script>
    
@endsection
