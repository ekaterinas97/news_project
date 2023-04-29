<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
//        dd($request->validated());
        $news = News::create($request->validated());

        if($news->save()){
            $news->categories()->attach($request->getCategoryIds());
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.success'));
        }

        return back()->with('error', __('messages.admin.news.fail'));

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
     * @param EditRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());
        if($news->save()){
            $news->categories()->sync($request->getCategoryIds());
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): JsonResponse
    {
        try {
            $news->delete();
            return \response()->json('ok', 200);
        }catch (\Exception $exception){
            \Log::error($exception->getMessage(), [$exception]);
            return \response()->json('error', 400);
        }
    }
}
