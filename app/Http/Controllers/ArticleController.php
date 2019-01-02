<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $articles = Article::paginate(15);

        return ArticleResource::collection($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\Article || String
     */
    public function store(Request $request)
    {

        $article = new Article();

        $article->title = $request->input('article_title');
        $article->body = $request->input('article_body');

        if ($article->save()) {
            return new ArticleResource($article);
        }

        return 'fail';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Http\Resources\Article
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->id = $id;
        $article->title = $request->input('article_title');
        $article->body = $request->input('article_body');

        if ($article->save()) {
            return new ArticleResource($article);
        }

        return 'fail';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \App\Http\Resources\Article
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        if($article->delete()) {
            return new ArticleResource($article);
        }
    }
}
