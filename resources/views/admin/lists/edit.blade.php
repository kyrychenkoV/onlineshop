@extends('layouts.admin')
@section('header')
    @include('admin.navPanel')
@endsection

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="col-lg-12">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h1>Редагувати ліст</h1>
                    {!! Form::model($list, array(
                                                'method' => 'PUT',
                                                'route' => ['list.update', $list->id,],
                                                'files'=>true))!!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:', ['class' => 'focus']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Редагувати ліст', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}

            </div>


        </div>
    </div>

@endsection