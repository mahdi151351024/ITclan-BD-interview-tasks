<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $response = Http::get('https://newsapi.org/v2/everything?q=tesla&from=2021-06-27&sortBy=publishedAt&apiKey=039e8cbbf615415e9447d51cbe00c4cf');
        $data = json_decode($response);
        $articles = [];
        if($data->articles)
        {
            $articles = $data->articles;
        }
        return view('home', compact('articles'));
    }
}
