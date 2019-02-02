@extends('layouts.app')

@section('content')
<h1>PHP</h1>
<?php
if(isset ($pics)){
    foreach($pics as $pic){
        echo "<div class='showroom'><ul class='ul-box'>";
        //echo $pic."<br>";
        ?>
        <li>
                <a href="/home"><img src='{{asset('storage/'.$pic)}}' width="200" height="200"></a><br>
        </li>
        <?php
        echo "</ul></div>";
    }
}

?>
@endsection