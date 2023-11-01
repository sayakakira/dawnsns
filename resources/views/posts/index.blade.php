@extends('layouts.login')

@section('content')
{!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか...?', 'maxlength' => '5', ]) !!}


@if($errors->has('newPost'))
<div class="error">
  <p>{{ $errors->first('newPost')}}</p>
</div>
@endif

        </div>
        <button type="submit" class="btn btn-success pull-right">投稿</button>
        {!! Form::close() !!}
<h2>投稿一覧</h2>
<table class='table table-hover'>
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
                <th></th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a class="btn btn-primary" href="/post/{{ $post->id }}/update-form">編集</a>
                </td>

                <td>{!! Form::open(['url' => '/post/update']) !!}
        <div class="form-group">
            {!! Form::hidden('id', $post->id) !!}
            {!! Form::input('text', 'upPost', $post->posts, ['required', 'class' => 'form-control']) !!}
        </div>
        <button type="submit" class="btn btn-primary pull-right">更新</button>
        {!! Form::close() !!}</td>


                <td><a class="btn btn-danger" href="/post/{{ $post->id }}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">削除</a></td>
            </tr>
            @endforeach
        </table>
@endsection
