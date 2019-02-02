@extends('layouts.app')

@section('content')
<!--ここから書く-->
<h1>ようこそ、{{ Auth::user()->name }}さん</h1>
<div class="account information">
    <h2>登録情報</h2>
    <p>アカウント名:{{ Auth::user()->name }}</p>
    <p>メールアドレス:{{ Auth::user()->email}}</p>
    <p>アカウント作成日:{{Auth::user()->created_at}}</p>
    <p>更新日:{{Auth::user()->updated_at}}</p>
</div>



<span class="uploade"><a href="/upload" name="upload"> 画像をアップロードする</a></span>

<?php
if(isset ($pics)){
    foreach($pics as $pic){
        echo "<div class='showroom'><ul class='ul-box'>";
        //echo $pic."<br>";
        ?>
        <li>
                <a href="/home"><img src='{{asset('storage/'.$pic)}}' width="200" height="200"></a>
        </li>
        <?php
        echo "</ul></div>";
    }
}
else {
    echo "<center>まだ投稿していません。</center>";
}

?>


@endsection
