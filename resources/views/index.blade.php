@extends('layouts.index')

@section('header')
    @include('navPanel')
@endsection


@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="row">
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                @endif
                <div class="col-lg-2">
                    @foreach($lists as $list)
                        <div class="product col-lg-12 col-md-12 col-xs-12">
                            <a href="#"><p>{{$list->name}}</p></a>
                        </div>
                    @endforeach

                </div>
                <div class="col-lg-10">
                    <div>Главная страница</div>
                    <h1> Категории товаров</h1>
                    <hr>
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="product col-lg-2 col-md-3 col-xs-6">

                                <p><img class="picture" src="{{asset($post->getPath().'/'.$post->img)}}" style="width:150px;height: 200px"></p>
                                <p>{{ $post->product_name }}</p>
                                <p>{{ $post->product_group_id }}</p>
                                <td>{!!  $post->price !!} грн.</td>
                                <p>Відгук</p>
                            </div>
                        @endforeach



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

