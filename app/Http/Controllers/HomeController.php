<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Post; //model
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth; //Auth認証取得
use Illuminate\Support\Facades\DB; //DB


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user()->name;
        $pics =DB::table('posts')->where('name',$user)->pluck('image');
        return view('home', compact('pics'));
    }
    
    //C code pictures page
    public function c()
    {
        $title=DB::table('posts')->where('language','C')->pluck('title'); //DBのカラムlanguageがCのものからtitleを取得代入
        $pics =DB::table('posts')->where('language','C')->pluck('image'); //DBのカラムlanguageがCのものからimageを取得代入
        $content=DB::table('posts')->where('language','C')->pluck('content');//DBのカラムlanguageがCのものからcontentを取得代入
        return view('c-page', compact('title','pics','content'));
    }
    
    //Python pictures page
    public function python()
    {
        $title=DB::table('posts')->where('language','Python')->pluck('title'); //DBのカラムlanguageがCのものからtitleを取得代入
        $pics =DB::table('posts')->where('language','Python')->pluck('image'); //DBのカラムlanguageがCのものからimageを取得代入
        $content=DB::table('posts')->where('language','Python')->pluck('content');//DBのカラムlanguageがCのものからcontentを取得代入
        return view('c-page', compact('title','pics','content'));
    }
    
    //php pictures page
    public function php()
    {
        $title=DB::table('posts')->where('language','PHP')->pluck('title'); //DBのカラムlanguageがCのものからtitleを取得代入
        $pics =DB::table('posts')->where('language','PHP')->pluck('image'); //DBのカラムlanguageがCのものからimageを取得代入
        $content=DB::table('posts')->where('language','PHP')->pluck('content');//DBのカラムlanguageがCのものからcontentを取得代入
        return view('c-page', compact('title','pics','content'));
    }
    
    //machine code pictures page
    public function machine()
    {
        $title=DB::table('posts')->where('language','Macine')->pluck('title'); //DBのカラムlanguageがCのものからtitleを取得代入
        $pics =DB::table('posts')->where('language','Machine')->pluck('image'); //DBのカラムlanguageがCのものからimageを取得代入
        $content=DB::table('posts')->where('language','Machine')->pluck('content');//DBのカラムlanguageがCのものからcontentを取得代入
        return view('c-page', compact('title','pics','content'));
    }
    
    //download each image
    /*できないから保留（画像クリック->ダウンロードページ)
    public function download(Rrequest $request)
    {
        $showimage=$request->file('image1');
        return view('download', compact('showimage'));
    }
    */
    
    //upload page
    public function upload()
    {
        $image=Post::all();
        return view('upload', compact('image'));
    }
    
    //uploaded page
    public function store(Request $request)
    {
        $title=$request->title;
        $file=$request->file('image');
        $content=$request->content;
        $language=$request->languages;
        $fileName=basename($file); //画像パス取得
        $username=Auth::user()->name;
        if ($request->hasFile('image')){
            if ($request->file('image')->isValid()){
                echo("<center>".'アップロードに成功しました。'."<br>");
                echo $file."<br></center>";
                //ストレージへ
                $request->image->storeAs('public',$fileName);
                $post=new Post;
                $post->title=$title;
                $post->image=$fileName;
                $post->content=$content;
                $post->language=$language;
                $post->name=$username;
                $post->save();
            }
            else{
                echo('アップロードに失敗しました。');
            }
        }
        else{
            echo ('存在していません。');
        }
        return view('upload');
    }
}
