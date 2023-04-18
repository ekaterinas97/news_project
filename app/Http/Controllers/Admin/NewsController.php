<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return View
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        return view('admin.news.index', [
            'newsList' => $newsQueryBuilder->getNewsWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return  view('admin.news.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'statusList' => NewsStatus::all()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required'
        ]);
        $news = new News($request->except('_token', 'category_id')); // News::create()

        if($news->save()){
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно добавлена');
        }

        return back()->with('error', 'Не удалось сохранить запись');

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
     * @param News $news
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return  view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'statusList' => NewsStatus::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $news = $news->fill(($request->except('_token', 'category_id')));
        if($news->save()){
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
