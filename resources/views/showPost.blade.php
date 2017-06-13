@extends('layouts.index')

@section('header')
    @include('navPanel')
@endsection


@section('content')
    <div class="wrapper">
        <div class="container">

            <div class="col-lg-10  wrapper-post ">
                <div class="image">
                    <img class="image " src="{{asset($post->getImage())}}">
                </div>
                <div>
                    <p><span class="name">Категорія:</span>{{$post->product_name}}</p>
                </div>
                <div>
                    <p><span class="name">Опис:</span>{{$post->description}}</p>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
