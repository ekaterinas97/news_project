<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $model = new News();
        $newsList = $model->getNews();
//        $join = \DB::table('news')
//            ->join('category_has_news as chn', 'news.id' , '=', 'chn.news_id')
//            ->join('categories', 'chn.category_id', '=', 'categories.id')
//            ->select("news.*", 'chn.category_id', 'categories.title as ctitle')
//            ->get();
//        dd($join);
        return view('admin.news.index', [
            'newsList' => $newsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('admin.news.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'title' => 'required'
//        ]);
//        dd($request->only(['title', 'description']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
