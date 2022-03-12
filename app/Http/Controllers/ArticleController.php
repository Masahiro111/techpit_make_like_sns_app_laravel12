<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {

        // ダミーデータ
        // $articles = [
        //     (object) [
        //         'id' => 1,
        //         'title' => 'タイトル1',
        //         'body' => '本文1',
        //         'created_at' => now(),
        //         'user' => (object) [
        //             'id' => 1,
        //             'name' => 'ユーザー名1',
        //         ],
        //     ],
        //     (object) [
        //         'id' => 2,
        //         'title' => 'タイトル2',
        //         'body' => '本文2',
        //         'created_at' => now(),
        //         'user' => (object) [
        //             'id' => 2,
        //             'name' => 'ユーザー名2',
        //         ],
        //     ],
        //     (object) [
        //         'id' => 3,
        //         'title' => 'タイトル3',
        //         'body' => '本文3',
        //         'created_at' => now(),
        //         'user' => (object) [
        //             'id' => 3,
        //             'name' => 'ユーザー名3',
        //         ],
        //     ],
        // ];

        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));
    }
}
