@extends('layouts.admin')

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
                <div>Лівий сайт бар</div>
                <hr>
                {{--@foreach($postsList as $postList)--}}
                    {{--<div class="product col-lg-12 col-md-12 col-xs-12">--}}
                        {{--<a href="#"><p>{{$postList->name}}</p></a>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            </div>
            <div class="col-lg-10">
                <table class="table  table-bordered">
                    <div
                            class="createPost"><a href="{{ route('list.create') }}" class="btn btn-success btn-lg">Створити ліст</a>
                    </div>
                    <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Категорія товару</th>
                        <th>Кількість товару</th>
                        <th>Редагувати</th>
                        <th>Видалити</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lists as $list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><h4>{{ $list->name }}</h4></td>
                            <td>{!!  20 !!}</td>
                            <td>

                                <a href="{{ route('list.edit', $list->id) }}" class="btn btn-primary">Змінити</a>
                            </td>
                            <td>
                                {!! Form::open([ 'method' => 'DELETE',
                                                 'route' => ['list.destroy', $list->id]]) !!}
                                {!! Form::submit('Видалити ліст', ['class' => 'btn btn-danger']) !!}
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