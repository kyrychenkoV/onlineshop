@extends('layouts.index')

@section('header')
    @include('navPanel')
@endsection


@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-10">
                <div>
                    <img class="picture" src="{{asset($post->getImage())}}" style="width:150px;height:150px">
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
                <div>
                    {{$post->price}} грн
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
