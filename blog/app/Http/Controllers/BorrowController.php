<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\Member;
use App\Ledger;
use App\Catalog;
use Illuminate\Http\Request;
use Request as PostRequest;

class BorrowController extends Controller
{
    // public function query(Request $request) {
    //     $query = Borrow::with(['ledger.catalog','member']);
    //     $query->where('member_id', $request->member_id);
    //     $borrows = $query->get();
    //     return view('borrows.query',['borrows' => $borrows]);
    // }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $query = Borrow::with(['ledger.catalog','member']);
         if ($request->member_id) {
             $query->where('member_id', $request->member_id);
         } else  {$query -> select('*');}
        $borrows = $query->get();
        return view('borrows.index', ['borrows' => $borrows]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = \Carbon\Carbon::now()->subDays(60);
        $borrow = Borrow::with(['ledger.catalog','member']);
        $this->validate($request, [
            // 'ledger_id'=>'required',
            'member_id'=>'required',
        ]);
        $borrow = $borrow->get();
        //データベースへの追加
        $borrow = new Borrow;
        $borrow->ledger_id = $request->ledger_id;
        $borrow->member_id = $request->member_id;
        $borrow->borrow_date = \Carbon\Carbon::now();
        if($borrow->ledger->catalog->publisher_date >= $time){
            $borrow->return_date = \Carbon\Carbon::now()->addDays(10);
        } else {
            $borrow->return_date = \Carbon\Carbon::now()->addDays(15);
        }
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
