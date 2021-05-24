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
            // $query = Catalog::where('title', 'LIKE', '%'.$request->title.'%')->get();//->with(['catalog', 'borrows'])->get();
            //ddd($query);
        if($request->sort=='asc'){
            $ledgers = $query->orderBy('id')->paginate(15);
        } elseif($request->sort=='desc') {
            $ledgers = $query->orderBy('id', 'desc')->paginate(15);
        } else {
            $ledgers = $query->orderBy('id')->paginate(15);
        }
        // dd($ledgers);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'catalog_id'=>'required',
        ]);
        $ledger = new \App\Ledger;
        $ledger->catalog_id = $request->catalog_id;
        $ledger->arrival_day = \Carbon\Carbon::now();
        $ledger->save();
        return redirect(route('ledgers.index'));
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
            'catalog_id'=>'required',
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
        return redirect(route('ledgers.index'));
    }
}
