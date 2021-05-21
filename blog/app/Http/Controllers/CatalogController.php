<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Genre;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Catalog::with('genre');
        if ($request->id) {
            $query->where('id', $request->id);
        } else  {$query -> select('*');}
        if ($request->title) {
            $query->where('title', 'LIKE', "%$request->title%");
        } else  {$query -> select('*');}
        if ($request->author) {
            $query->where('author', 'LIKE', "%$request->author%");
        } else  {$query -> select('*');}
        if ($request->genre_id) {
            $query->where('genre_id', "$request->genre_id");
        } else  {$query -> select('*');}
        $books = $query->get();
        $genres = Genre::withCount('catalogs')->get();
        return view('books.index',['books' => $books, 'genres'=>$genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ISBN_id'=>'required',
            'title'=>'required',
            'genre_id'=>'required',
            'publisher'=>'required',
            'publisher_date'=>'required',
        ]);
        $book = new Catalog;
        $book->ISBN_id =  $request->ISBN_id;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre_id = $request->genre_id;
        $book->publisher = $request->publisher;
        $book->publisher_date = $request->publisher_date;
        $book->timestamps = false;
        $book->save();
        $books = Catalog::all();
        return redirect(route('catalogs.index',['books' => $books]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Catalog::find($id);
        return view('books.show',['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Catalog::find($id);
        return view('books.edit',['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ISBN_id'=>'required',
            'title'=>'required',
            'genre_id'=>'required',
            'publisher'=>'required',
            'publisher_date'=>'required',
        ]);
        $book = Catalog::find($id);
        $book->ISBN_id =  $request->ISBN_id;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre_id = $request->genre_id;
        $book->publisher = $request->publisher;
        $book->publisher_date = $request->publisher_date;
        $book->timestamps = false;
        $book->save();
        return redirect(route('catalogs.show',$book->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Catalog::find($id);
        $book->delete();
        return redirect(route('catalogs.index'));
    }
}
