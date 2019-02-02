@extends('layouts.app')

@section('content')
<h1>画像をアップロードする</h1>
<div class="upload-form">
<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field()}}
    <p>Title:<input type="text" name="title" maxlength="20"></p>
    <p><input type="file" name="image"></p>
    <p><textarea name="content" rows="4" cols="40" maxlength="140" placeholder="コメント"></textarea></p>
    <p>Code Type:<select name="languages">
        <option value="C">C Code</option>
        <option value="Python">Python</option>
        <option value="PHP">PHP</option>
        <option value="Machine">Machine Code</option>
    </select></p>
    <p><input type="submit" value="送信する"></p>
</form>


@endsection