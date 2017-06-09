@extends('layouts.admin')
@section('header')
    @include('admin.navPanel')
@endsection

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="col-lg-12">


                <div>
                    <img class="picture" src="{{asset($post->getPath().'/'.$post->img)}}" style="width:150px;height:150px">
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