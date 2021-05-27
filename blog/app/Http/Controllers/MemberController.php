<?php

namespace App\Http\Controllers;

use App\Member;
use App\Ledger;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Member::withCount('borrows');
        if ($request->id) {
            $query->where('id', $request->id);
        }
        if ($request->email) {
            $query->where('email', 'LIKE', '%'.$request->email.'%');
        }
        if($request->sort=='asc'){
            $members = $query->orderBy('id')->paginate(15);
        } elseif($request->sort=='desc') {
            $members = $query->orderBy('id', 'desc')->paginate(15);
        } else {
            $members = $query->orderBy('id')->paginate(15);
        }
        //$members = $query->orderBy('id')->paginate(15);
        return view('members.index', ['members'=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = new Member;
        return view('members.create', ['member'=>$member]);
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
            'name' => 'required|max:255',
            'postal' => 'required|integer|max:10000000',
            'address' => 'required|max:255',
            'tel' => 'required|max:13',
            'email' => 'required|email|max:255|unique:members,email',
            'birthday' => 'required|date'
        ]);
        $member = new Member;
        $member->name=$request->name;
        $member->postal=$request->postal;
        $member->address=$request->address;
        $member->tel=$request->tel;
        $member->email=$request->email;
        $member->birthday=$request->birthday;
        $member->save();
        return redirect(route('members.index'))->with('msg', '会員が登録されました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('members.show', ['member'=>$member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit', ['member'=>$member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'postal' => 'required|integer|max:11',
            'address' => 'required|integer|max:255',
            'tel' => 'required|integer|max:255',
            'email' => 'required|email|max:255|unique',
            'birthday' => 'required|date'
        ]);
        $member->update($request->all());
        return redirect(route('members.show', $member));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect(route('members.index'))->with('msg', '会員が登録されました');
    }
}
