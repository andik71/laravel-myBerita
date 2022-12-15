@extends('landingpage.index')
@section('content')

<section>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="page-title">About me</h1>
            </div>
        </div>

        <div class="row mb-5">

            <div class="d-md-flex post-entry-2 half">
                <a href="{{ url('/contact') }}" class="me-4 thumbnail">
                    <img src="{{ url('/img/post-landscape-2.jpg')}}" alt="myfoto.jpg" title="foto-dummy" class="img-fluid">
                </a>
                <div class="ps-md-5 mt-4 mt-md-0">
                    <div class="post-meta mt-4">Introducing</div>
                    <h2 class="mb-4 display-4">Sharkia Amalia</h2>

                    <p>Perkenalkan nama saya Sharkia Amalia, saya adalah seorang mahasiswa semester 5, yang berkuliah di Universitas Tadulako Palu dengan mengambil program studi Teknik Informatika</p>
                    <p>Saya sekarang sedang mengikuti program Studi Independen Bersertifikat dengan harapan saya dapat mengembangkan skill serta memperluas wawasan saya terkait web developing</p>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection