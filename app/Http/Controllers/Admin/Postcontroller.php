<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Posts;

class Postcontroller extends Controller
{
  public function add()
  {
      return view('admin.news.post');
  }
  
  public function create(Request $request)
  {
      // Varidationを行う
      $this->validate($request, Posts::$rules);
      $posts = new Posts;
      $form = $request->all();
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      // データベースに保存する
      $posts->fill($form);
      $posts->save();
      return redirect('admin/posts');
  }
  
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Posts::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Posts::all();
      }
      return view('admin.news.postindex', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  public function delete(Request $request)
  {
      // 該当するposts Modelを取得
      $posts = Posts::find($request->id);
      // 削除する
      $posts->delete();
      return redirect('admin/posts');
  } 
}