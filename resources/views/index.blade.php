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

                        <div><span class="left-title">Категорії товарів</span></div>
                        <hr>
                        {!! Form::open(array('route' => 'index','method' => 'get')) !!}
                        {!! Form::text('search',null,['class'=>'form-control','placeholder'=>'Пошук за заголовком']) !!}
                        @foreach($postsList as $postList)
                            <div class="product  col-lg-12 col-md-12 col-xs-12">
                                {!! Form::checkbox('list[]',$postList->id) !!}
                                {!! Form::label('list[]', $postList->name, ['class' => 'focus']) !!}

                            </div>
                        @endforeach
                        {!! Form::submit('Пошук', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}

                    </div>
                    <div class="col-lg-10">
                        <div class="title"> <span>Перелік товарів</span></div>
                    <hr class="line">
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="product col-lg-2 col-md-3 col-xs-6">
                                    <a href="/post?id={{$post->id}}"><p><img class="picture" src="{{asset($postOne->getImage().$post->img)}}" style="width:150px;height: 200px"></p></a>
                                    <div class="title-group"><p>{{ $post->product_name }}</p></div>
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

