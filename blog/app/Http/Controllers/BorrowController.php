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
    public function index(Request $request)
    {
        $borrows = [];
        if ($request->all()) {
            $query = Borrow::with(['ledger.catalog','member']);
            if ($request->member_id) {
                $query->where('member_id', $request->member_id);
            } 
            $borrows = $query->get();
            $search_flag = true;
        } else {
            $search_flag = false;
        }
        return view('borrows.index', ['borrows' => $borrows, 'search_flag' => $search_flag]);
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
            'ledger_id'=>'required|unique:borrows,ledger_id|exists:ledgers,id',
            'member_id'=>'required|exists:members,id',
        ]);
        $borrow = $borrow->get();
        $count = $borrow->where('member_id', $request->member_id)->count();
        //データベースへの追加
        $borrow = new Borrow;
        $borrow->ledger_id = $request->ledger_id;
        if ($count < 5) {
            $borrow->member_id = $request->member_id;
        } else {
            return redirect(route('borrows.index'))->with('msg', '上限です！！！');
        }
        $borrow->borrow_date = \Carbon\Carbon::now();
        if ($borrow->ledger->catalog->publisher_date >= $time) {
            $borrow->return_date = \Carbon\Carbon::now()->addDays(10);
        } else {
            $borrow->return_date = \Carbon\Carbon::now()->addDays(15);
        }
        $borrow->save();
        return redirect(route('borrows.index'))->with('msg', '書籍が貸し出されました');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        $this->validate($request,[
            'ledger_id'=>'required|unique:borrows,ledger_id|exists:ledgers,id',
            'member_id'=>'required|exists:members,id',
        ]);
        $member = Member::find($request->member_id);
        $ledger = Ledger::with('catalog')->find($request->ledger_id);
        $borrow = $request;
        return view('borrows/confirm', ['borrow' => $borrow, 'member' => $member, 'ledger' => $ledger]);
    }

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
        return redirect(route('borrows.index'))->with('msg', '書籍が返却されました');
    }
}
