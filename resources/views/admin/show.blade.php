@extends('layouts.admin')
@section('header')
    @include('admin.navPanel')
@endsection

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="col-lg-12  wrapper-post">
                <div>
                    <img class="image" src="{{asset($post->getImage())}}">
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