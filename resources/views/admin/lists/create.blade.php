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

                <h1>Сворити ліст</h1>
                {!! Form::open(array('url' => '/list','files'=>true)) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name:', ['class' => 'focus']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Створити ліст', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}

            </div>


        </div>
    </div>

@endsection