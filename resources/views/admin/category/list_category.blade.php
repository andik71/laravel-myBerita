@extends('admin.index')
@section('content')
    <div class="pagetitle">
        <h1>Category Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category Lists</h5>

                        <div class="tombol">
                            <a title="Tambah Data" class="btn btn-sm btn-primary mb-2 me-1"
                                href="{{ url('administrator/category/add') }}"><i class="bi bi-plus-lg"></i>Add Data</a>
                            <a title="Download PDF" class="btn btn-sm btn-danger mb-2 me-1"
                                href="{{ url('administrator/category/report') }}"><i
                                    class="bi bi-file-earmark-pdf-fill"></i>PDF Download</a>
                        </div>

                        <!-- Category Table -->
                        <table class="table table-hover table-bordered responsive nowarp" id="example" style="width: 100%">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Tags</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($category as $row)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row->category }}</td>
                                        <td>{{ $row->tags }}</td>
                                        <td class="text-center">
                                            <form class="d-inline"
                                                action="{{ url('administrator/category/' . $row->id . '/delete') }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="{{ $row->id }}">
                                                <button title="Hapus Data" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash"></i></button>
                                                <a title="Edit Data" class="btn btn-sm btn-info"
                                                    href="{{ url('administrator/category/' . $row->id . '/edit') }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <a title="Lihat Data" class="btn btn-sm btn-warning"
                                                    href="{{ url('administrator/category/detail') }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Default Table Category -->
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
            var table = $('#example').DataTable({
                responsive: true
            });

        });
    </script>
@endsection
