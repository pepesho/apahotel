<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Member;
use Illuminate\Http\Request;
use Request as PostRequest;

class BorrowController extends Controller
{
    // public function query(){
    //     return view('borrows.query');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $borrows = Borrow::all();
        return view('borrows.index',['borrows' => $borrows]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $borrow = new Borrow;
        $borrow->book_id = $request->book_id;
        $borrow->member_id = $request->member_id;
        $borrow->borrow_date = \Carbon\Carbon::now();
        $borrow->save();
        return redirect(route('borrows.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        // $borrows = Borrow::all();
        // return view('borrows.show', ['borrow' => ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // ddd($request);
        // $borrow = Borrow::find($id);
        // $borrow->delete();
         
        $checked = PostRequest::input('checked',[]);
        foreach ($checked as $id) {
        Borrow::where("id",$id)->delete(); //Assuming you have a Todo model. 
   }
        return redirect(route('borrows.index'));
    }
}
