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
                <h1>Редагувати пост</h1>
                    {!! Form::model($post, array(
                                            'method' => 'PUT',
                                            'route' => ['admin.update', $post->id,],
                                            'files'=>true))!!}

                <div class="form-group">
                    {!! Form::label('product_name', 'Title:', ['class' => 'focus']) !!}
                    {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'editor2']) !!}

                    <br/>

                    {!! Form::label('post_list_id', 'Ціна:') !!}
                    {!! Form::select('post_list_id', [$lists], null, ['placeholder' => 'Оберіть категорію товару...']) !!}
                    <br>
                    {!! Form::label('price', 'Ціна:') !!}
                    {!!  Form::number('price', 'value') !!}

                    <br>
                    {!! Form::label('img', 'Add image:') !!}
                    {!!Form::file('img',['class' => 'btn'])!!}
                </div>
                {!! Form::submit('Змінити пост', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}

            </div>


        </div>
    </div>
@endsection