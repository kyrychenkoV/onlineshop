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
                    {{$post->product_name}}
                </div>
                <div>
                    {{$post->description}}
                </div>
                <div>
                    {{$post->product_group_id}}
                </div>

            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
