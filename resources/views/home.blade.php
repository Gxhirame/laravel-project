@extends('layouts.app')

@section('content')
<!--ここから書く-->
<h1>Welcom {{ Auth::user()->name }}</h1>
<div class="account information">
    <h2>User Information</h2>
    <p>User Name:{{ Auth::user()->name }}</p>
    <p>Mail address:{{ Auth::user()->email}}</p>
    <p>Created Date and Time:{{Auth::user()->created_at}}</p>
    <p>Date of Update:{{Auth::user()->updated_at}}</p>
</div>



<span class="uploade"><a href="/upload" name="upload"> Upload a image file</a></span>

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
