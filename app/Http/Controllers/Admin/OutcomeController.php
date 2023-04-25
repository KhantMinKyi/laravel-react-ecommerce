<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outcome;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outcomes = Outcome::latest()->paginate(10);
        $today_outcome = Outcome::where('date',Carbon::now())->sum('amount');
        $date = Carbon::now();

        if($date = request()->date){
            $outcomes = Outcome::where('date',$date)->paginate(10);
            $today_outcome = Outcome::where('date',$date)->sum('amount');
            $date =request()->date;
        }
        return view('admin.outcome.index',compact('outcomes','today_outcome','date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.outcome.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'date'=>'required',
            'amount'=>'required|integer'
                ]);
        Outcome::create([
            'title'=>$request->title,
            'date'=>$request->date,
            'amount'=>$request->amount,
            'description'=>$request->description
        ]);
        return redirect()->back()->with('success',"Outcome Created Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outcome = Outcome::where('id',$id)->first();
        return view('admin.outcome.edit',compact('outcome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'date'=>'required',
            'amount'=>'required|integer'
        ]);
        $outcome =Outcome::where('id',$id)->first();
        // Error Handle
        if(!$outcome){
            return redirect()->back()->with('error',"Outcome Not Found");
        }
        // update
        $outcome->update([
            'title'=>$request->title,
            'date'=>$request->date,
            'amount'=>$request->amount,
            'description'=>$request->description
        ]);

        return redirect()->back()->with('success',"Outcome Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find product
        $outcome= Outcome::where('id',$id)->first();
        if(!$outcome){
        return redirect()->back()->with('error','Outcome not Found');
        }
        //delete
        $outcome->delete();
        return redirect()->back()->with('success',"Outcome Deleted");
    }
}
