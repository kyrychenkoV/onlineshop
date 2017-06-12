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

                        <div>Категорії товарів</div>
                        <hr>
                        {!! Form::open(array('route' => 'index','method' => 'get')) !!}
                        {!! Form::text('search',null, null,['class'=>'form-control','placeholder'=>'Пошук за заголовком']) !!}
                        @foreach($postsList as $postList)
                            <div class="product  col-lg-12 col-md-12 col-xs-12">
                                {!! Form::label('list[]', $postList->name, ['class' => 'focus']) !!}
                                {!! Form::checkbox('list[]',$postList->id) !!}
                            </div>
                        @endforeach
                        {!! Form::submit('Пошук', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                <div class="col-lg-10">
                    <div>Главная страница</div>
                    <h1> Категории товаров</h1>
                    <hr>
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="product col-lg-2 col-md-3 col-xs-6">

                                <a href="/post?id={{$post->id}}"><p><img class="picture" src="{{asset($post->getImage())}}" style="width:150px;height: 200px"></p></a>
                                <p>{{ $post->product_name }}</p>
                                <p>{{ $post->product_group_id }}</p>
                                <td>{!!  $post->price !!} грн.</td>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>



@endsection

@section('footer')
    @include('footer')
@endsection

