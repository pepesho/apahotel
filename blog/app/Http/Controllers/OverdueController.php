<?php

namespace App\Http\Controllers;

use App\Overdue;
use App\Borrow;
use Illuminate\Http\Request;

class OverdueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = date("Y-m-d");
        $query = Borrow::with('member')->where('return_date', '<', $date);  
        //ddd($overdues);
        if ($request->id) {
            $query->where('id', $request->id);
        }
        if ($request->name) {
            $query->whereHas('member',function($query) use ($request){
                $query->where('name','LIKE','%'.$request->name.'%');
            });
        }
        if ($request->email) {
            $query->whereHas('member',function($query) use ($request){
                $query->where('email', 'LIKE', '%'.$request->email.'%');
            });
        }
        if($request->sort=='asc'){
            $overdues = $query->orderBy('member_id')->paginate(15);
        } elseif($request->sort=='desc') {
            $overdues = $query->orderBy('member_id', 'desc')->paginate(15);
        } else {
            $overdues = $query->orderBy('member_id')->paginate(15);
        }
        return view('overdues.index' ,['overdues' => $overdues,'date' => $date]);
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Overdue  $overdue
     * @return \Illuminate\Http\Response
     */
    public function show(Overdue $overdue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Overdue  $overdue
     * @return \Illuminate\Http\Response
     */
    public function edit(Overdue $overdue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Overdue  $overdue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Overdue $overdue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Overdue  $overdue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Overdue $overdue)
    {
        //
    }
}
