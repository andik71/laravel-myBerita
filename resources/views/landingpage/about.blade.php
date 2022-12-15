@extends('landingpage.index')
@section('content')

<section>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="page-title">About us</h1>
            </div>
        </div>

        <div class="row mb-5">

            <div class="d-md-flex post-entry-2 half">
                <a href="{{ url('/contact') }}" class="me-4 thumbnail">
                    <img src="{{ url('/img/post-landscape-2.jpg')}}" alt="" class="img-fluid">
                </a>
                <div class="ps-md-5 mt-4 mt-md-0">
                    <div class="post-meta mt-4">About us</div>
                    <h2 class="mb-4 display-4">Company History</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat
                        maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque
                        provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis
                        sunt ullam temporibus aut!</p>
                    <p>Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi
                        dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci
                        sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat
                        officiis eligendi.</p>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection