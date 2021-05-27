<?php

namespace App\Http\Controllers;

use App\Catalog;
use App\Genre;
use App\Ledger;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function isbn(){
        $genres = Genre::all();
        
        return view('books.isbn', ['genres' => $genres]);
    }

    public function check(Request $request){
        $this->validate($request, [
            'isbn_id'=>'required|unique:catalogs,ISBN_id',
        ]);
        $isbn = $request->isbn_id;
        $url = 'https://api.openbd.jp/v1/get?isbn=' . $isbn;
        $json = file_get_contents($url);
        $data = json_decode($json);
        if($data[0] == null ){
            $book = Catalog::with('genre');
            $genres = Genre::withCount('catalogs')->get();
            return view('books.create', ['book' => $book, 'genres'=>$genres, 'isbn' =>$isbn]);
        } else{
            $openbd = $data[0];
            $authors = '';
            foreach ($openbd->onix->DescriptiveDetail->Contributor as $value) {
                $authors .= $value->PersonName->content . ',';
            }
            $book = new Catalog;
            $book->ISBN_id =  $request->isbn_id;
            $book->title = $openbd->summary->title;
            $book->author = substr($authors, 0, -1);;
            $book->genre_id = $request->genre_id;
            $book->publisher = $openbd->summary->publisher;
            $book->publisher_date = date("Y-m-d", strtotime($openbd->summary->pubdate));
            if(!empty($openbd->summary->cover)){
            $book->book_img = $openbd->summary->cover;
            }else{
                $book->book_img = "/images/noimage.png";
            }
            $book->save();
            $books = Catalog::all();
            return redirect(route('catalogs.index',['books' => $books]));  
        }
    }
    public function index(Request $request)
    {
        $query = Catalog::with('genre')->with('ledgers');
        if ($request->ISBN_id) {
            $query->where('ISBN_id', 'LIKE','%' . $request->ISBN_id . '%');
        } else  {$query -> select('*');}
        if ($request->title) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        } else  {$query -> select('*');}
        if ($request->author) {
            $query->where('author', 'LIKE', '%' . $request->author . '%');
        } else  {$query -> select('*');}
        if ($request->genre_id) {
            $query->where('genre_id', "$request->genre_id");
        } else  {$query -> select('*');}
        //$books = $query->orderBy('id')->paginate(20);
        if($request->sort=='asc'){
            $books = $query->orderBy('id')->paginate(20);
        } elseif($request->sort=='desc') {
            $books = $query->orderBy('id', 'desc')->paginate(20);
        } else {
            $books = $query->orderBy('id')->paginate(20);
        }
        $genres = Genre::withCount('catalogs')->get();
        // $ledgers = Ledger::withCount('catalog')->get();
        // dd($books);
        return view('books.index',['books' => $books, 'genres'=>$genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = Catalog::with('genre');
        $genres = Genre::withCount('catalogs')->get();
        return view('books.create', ['book' => $book, 'genres'=>$genres]);
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
            'ISBN_id'=>'required|max:13',
            'title'=>'required',
            'genre_id'=>'required',
            'publisher'=>'required',
            'publisher_date'=>'required|date',
        ]);
        $book = new Catalog;
        $book->ISBN_id =  $request->ISBN_id;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->genre_id = $request->genre_id;
        $book->publisher = $request->publisher;
        $book->publisher_date = $request->publisher_date;
        $book->book_img = "/images/noimage.png";
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
        $genres = Genre::withCount('catalogs')->get();
        return view('books.edit',['book' => $book, 'genres' => $genres]);
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
            'ISBN_id'=>'required|integer',
            'title'=>'required',
            'author' => 'required',
            'genre_id'=>'required',
            'publisher'=>'required',
            'publisher_date'=>'required|date',
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
