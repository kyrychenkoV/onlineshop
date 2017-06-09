@extends('layouts.index')

@section('header')
  @include('admin.navPanel')
@endsection
@section('content')
    <div class="wrapper">
        <div class="container-fluid">

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <div class="col-lg-2">
                <div>Категорії товарів</div>
                <hr>
                @foreach($postsList as $postList)
                    <div class="product col-lg-12 col-md-12 col-xs-12">
                    <a href="#"><p>{{$postList->name}}</p></a>
                </div>
                @endforeach
            </div>
            <div class="col-lg-10">
                <table class="table  table-bordered">
                    <div
                        class="createPost"><a href="{{ route('admin.create') }}" class="btn btn-success btn-lg">Створити пост</a>
                    </div>
                    <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Заголовок</th>
                        <th>Опис</th>
                        <th>Категорія</th>
                        <th>Ціна</th>
                        <th>Картинка</th>
                        <th>Подивитись</th>
                        <th>Зберегти</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><h4>{{ $post->product_name }}</h4></td>
                                <td>{!!  $post->description !!}</td>
                                <td>{!!  $post->product_group_id !!}</td>
                                <td>{!!  $post->price !!}</td>
                                <td >
                                    <img class="picture" src="{{asset($post->getPath().'/'.$post->img)}}" style="width:150px;height:150px">
                                </td>
                                <td>
                                    <a href="{{ route('admin.show', $post->id) }}" class="btn btn-primary">Переглянути</a>
                                    <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-primary">Змінити</a>
                                </td>
                                <td>
                                    {!! Form::open([ 'method' => 'DELETE',
                                                     'route' => ['admin.destroy', $post->id]]) !!}
                                    {!! Form::submit('Видалити пост', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection