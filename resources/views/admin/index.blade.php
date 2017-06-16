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
            <div class="col-lg-2 left-site-bar">

                <hr>
                {!! Form::open(array('route' => 'admin.index','method' => 'get','onchange'=>'submitForm()')) !!}
                {!! Form::text('search',null,['class'=>'form-control','placeholder'=>'Пошук за заголовком']) !!}
                <hr>
                <p class="info">Пошук за категоріями</p>
                @foreach($postsList as $postList)
                    <div class="product  col-lg-12 col-md-12 col-xs-12 ">
                        {!! Form::checkbox('list[]',$postList->id,['onchange'=>"alert(this.value)"]) !!}
                        {!! Form::label('list[]', $postList->name, ['class' => 'focus']) !!}

                    </div>
                 @endforeach
                {!! Form::submit('Пошук', ['class' => 'btn btn-primary search-button pull-left']) !!}
                {!! Form::close() !!}

            </div>
            <div class="col-lg-10">
                        <?php echo $data ?>
                <table class="table  table-bordered">
                    <div
                        class="createPost"><a href="{{ route('admin.create') }}" class="btn btn-success btn-lg pull-right">Створити пост</a>
                    </div>
                    <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Заголовок</th>
                        <th>Опис</th>
                        <th>Картинка</th>
                        <th>Переглянути</th>
                        <th>Змінити</th>
                        <th>Зберегти</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  ?>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->product_name }}</td>
                                <td>{!!  $post->description !!}</td>
                                <td >
                                    <img class="picture" src="{{ asset($postOne->getImage().$post->img) }}" style="width:150px;height:150px">
                                </td>
                                <td>
                                    <a href="{{ route('admin.show', $post->id) }}" class="btn btn-primary">Переглянути</a>
                                </td>
                                <td>
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
    <script>
            function submitForm() {
                document.querySelectorAll("input[type=submit]")[0].click();
            }

    </script>

@endsection