<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Display all the resources for API.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllApi(Request $request)
    {
        $articles = DB::table('articles')
                    ->join('stores', 'articles.store_id', '=', 'stores.id')
                    ->select('articles.id','articles.description','articles.name',
                    'articles.price','articles.total_in_shelf','articles.total_in_vault',
                    'articles.deleted_at',
                    'stores.name as store_name')
                    ->whereNull('articles.deleted_at')
                    ->get();
                    return response()->json(['articles' =>$articles, 'success'=> true, 'total_elements'=> count($articles)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showById($id)
    {
        $articles = DB::table('articles')
                  ->join('stores', 'articles.store_id', '=', 'stores.id')
                  ->select('articles.id','articles.description','articles.name',
                  'articles.price','articles.total_in_shelf','articles.total_in_vault','articles.deleted_at',
                  'stores.name as store_name')
                  ->whereNull('articles.deleted_at')
                  ->where('store_id',$id)
                  ->get();
        return response()->json(['articles' =>$articles, 'success'=> true, 'total_elements'=> count($articles)]);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return response()->json(['article' =>'Article successfully deleted!', 'success'=> true]);
    }

    public function store(Request $request)
    {
        $article = new Article;

        $article->name = $request->name;
        $article->description = $request->description;
        $article->price = $request->price;
        $article->total_in_shelf = $request->total_in_shelf;
        $article->total_in_vault = $request->total_in_vault;
        $article->store_id = $request->store_id;

        $article->save();
        return response()->json(['message' => 'Article created successfully!', 'success'=> true]);
    }

    public function update(Request $request, $id){
        $article = Article::find($id);
        
        $article->name = $request->name;
        $article->description = $request->description;
        $article->price = $request->price;
        $article->total_in_shelf = $request->total_in_shelf;
        $article->total_in_vault = $request->total_in_vault;
        $article->store_id = $request->store_id;

        $article->save();
        return response()->json(['article' => $article, 'message' => 'Article updated successfully!', 'success'=> true]);
    }
}
