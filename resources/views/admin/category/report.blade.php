<!DOCTYPE html>
<html>

<head>
    <title>Download PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
        </style>
</head>

<body>
    <p class="text-muted small">{{ $date }}</p>
    <h3 class="text-center">Website Berita - myBerita</h3>
    <h5 class="text-center mb-4">List Data Category</h5>

    <table class="table table-bordered nowarp" style="width: 100%;">
        <thead class="bg-light text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($category as $row)
                <tr>
                    <td class="text-center" scope="row">{{ $no++ }}</td>
                    <td>{{ $row->category }}</td>
                    <td>{{ $row->tags }}</td>
                </tr>
            @endforeach
        </tbody>
        <!-- <tfoot>
            <tr>
                <th class="text-center text-muted small" colspan="3">myBerita 2022 &copy; Sharkia Amalia</th>
            </tr>
        </tfoot> -->>
    </table>

</body>

</html>
