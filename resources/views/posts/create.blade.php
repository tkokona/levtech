<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <x-app-layout>
        <x-slot name="header">
            　Create
        </x-slot>
        <body>
            <h1>Blog Name</h1>
            <form action="/posts" method="POST">
                @csrf
                <div class="title">
                    <h2>タイトル</h2>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                    <p class="title_error" style="color:red">{{ $errors->first('post.title') }}</p>
                </div>
                <div class="body">
                    <h2>本文</h2>
                    <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。" {{ old('post.body') }}></textarea>
                    <p class="body_error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>
                <div class="category">
                    <h2>カテゴリー</h2>
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="保存"/>
            </form>
            <div class="back">
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>