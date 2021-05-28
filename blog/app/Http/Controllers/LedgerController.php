<?php

namespace App\Http\Controllers;

use App\Ledger;
use App\Catalog;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Ledger::with('catalog');
        if($request->title){
            $query->whereHas('catalog',function($query) use ($request){
                $query->where('title','LIKE', '%'.$request->title.'%');
            });
        } 
        if ($request->author) {
            $query->whereHas('catalog',function($query) use ($request){
                $query->where('author','LIKE', '%'.$request->author.'%');
            });
        }
        if($request->sort=='asc'){
            $ledgers = $query->orderBy('id')->paginate(15);
        } elseif($request->sort=='desc') {
            $ledgers = $query->orderBy('id', 'desc')->paginate(15);
        } else {
            $ledgers = $query->orderBy('id')->paginate(15);
        }
        return view('ledgers.index', ['ledgers' => $ledgers]);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('ledgers.create');
    }

    public function confirm(Request $request)
    {
        $this->validate($request,[
            'catalog_id'=>'required|exists:catalogs,id',
        ]);
        $catalog = Catalog::find($request->catalog_id);
        $ledger = $request;
        $date = \Carbon\Carbon::now();
        return view('ledgers/confirm', ['ledger' => $ledger, 'catalog' => $catalog, 'date' => $date]);
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
            'catalog_id'=>'required|exists:catalogs,id',
        ]);
        $ledger = new \App\Ledger;
        $ledger->catalog_id = $request->catalog_id;
        $ledger->arrival_day = \Carbon\Carbon::now();
        $ledger->save();
        return redirect(route('ledgers.index'))->with('msg', '在庫が追加されました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ledger = Ledger::with('catalog')->find($id);
        return view('ledgers.show', ['ledger' => $ledger]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ledger = \App\Ledger::find($id);
        return view('ledgers.edit', ['ledger' => $ledger]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'catalog_id'=>'required|unique',
        ]);
        $ledger = \App\Ledger::find($id);
        $ledger->catalog_id = $request->catalog_id;
        $ledger->arrival_day = $request->arrival_day;
        $ledger->save();
        return redirect(route('ledgers.show',$ledger->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ledger = \App\Ledger::find($id);
        $ledger->delete();
        return redirect(route('ledgers.index'))->with('msg', '在庫が削除されました');
    }
}
