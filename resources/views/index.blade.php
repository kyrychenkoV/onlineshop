@extends('layouts.index')

@section('header')
    @include('navPanel')
@endsection


@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div>Боковая панель</div>
                    <hr>
                    <div class="product col-lg-12 col-md-12 col-xs-12">
                        <a href="#"><p>Первый блок</p></a>
                        <a href=""><p>Первый блок</p></a>
                    </div>

                </div>
                <div class="col-lg-10">
                    <div>Главная страница</div>
                    <h1> Категории товаров</h1>
                    <hr>
                    <div class="row">
                        <div class="product col-lg-2 col-md-3 col-xs-6">
                            <h1>Первый блок</h1>
                            <p>Ціна</p>
                            <p>Відгук</p>
                        </div>
                        <div class="product col-lg-2 col-md-3 col-xs-6">
                            <h1>Первый блок</h1>
                            <p>Ціна</p>
                            <p>Відгук</p>
                        </div>
                        <div class="product col-lg-2 col-md-3 col-xs-6">
                            <h1>Первый блок</h1>
                            <p>Ціна</p>
                            <p>Відгук</p>
                        </div>
                        <div class="product col-lg-2 col-md-3 col-xs-6">
                            <h1>Первый блок</h1>
                            <p>Ціна</p>
                            <p>Відгук</p>
                        </div>
                        <div class="product col-lg-2 col-md-3 col-xs-6">
                            <h1>Первый блок</h1>
                            <p>Ціна</p>
                            <p>Відгук</p>
                        </div>
                        <div class="product col-lg-2 col-md-3 col-xs-6">
                            <h1>Первый блок</h1>
                            <p>Ціна</p>
                            <p>Відгук</p>
                        </div>
                        <div class="product col-lg-2 col-md-3 col-xs-6">
                            <h1>Первый блок</h1>
                            <p>Ціна</p>
                            <p>Відгук</p>
                        </div>
                        </div>
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination nav-center">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>

                    </div>

            </div>

        </div>
    </div>



@endsection

@section('footer')
    @include('footer')
@endsection

