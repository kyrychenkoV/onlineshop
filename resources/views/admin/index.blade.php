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
                {!! Form::open(array('route' => 'admin.index','method' => 'get')) !!}
                {!! Form::text('search',null, null,['class'=>'form-control','placeholder'=>'Пошук за заголовком']) !!}
                @foreach($postsList as $postList)
                    <div class="product  col-lg-12 col-md-12 col-xs-12">
                        {!! Form::label($postList->id, $postList->name, ['class' => 'focus']) !!}
                        {!! Form::checkbox($postList->id,$postList->name) !!}
                    </div>
                 @endforeach
                {!! Form::submit('Створити ліст', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}

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
                    <?php $i=1;?>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->product_name }}</td>
                                <td>{!!  $post->description !!}</td>
                                <td>{!!  $post->getNameList($post->post_list_id) !!}</td>
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