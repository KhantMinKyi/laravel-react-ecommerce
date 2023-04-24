<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::latest()->paginate(10);
        $today_income = Income::where('date',Carbon::now())->sum('amount');
        $date = Carbon::now();

        if($date = request()->date){
            $incomes = Income::where('date',$date)->paginate(10);
            $today_income = Income::where('date',$date)->sum('amount');
            $date =request()->date;
        }

        return view('admin.income.index',compact('incomes','today_income','date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.income.create');
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
        Income::create([
            'title'=>$request->title,
            'date'=>$request->date,
            'amount'=>$request->amount,
            'description'=>$request->description
        ]);
        return redirect()->back()->with('success',"Income Created Successfully");
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
        $income = Income::where('id',$id)->first();
        return view('admin.income.edit',compact('income'));
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
        $income =Income::where('id',$id)->first();
        // Error Handle
        if(!$income){
            return redirect()->back()->with('error',"Income Not Found");
        }
        // update
        $income->update([
            'title'=>$request->title,
            'date'=>$request->date,
            'amount'=>$request->amount,
            'description'=>$request->description
        ]);

        return redirect()->back()->with('success',"Income Updated Successfully");
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
                $income= Income::where('id',$id)->first();
                if(!$income){
                    return redirect()->back()->with('error','Income not Found');
                }
                //delete
                $income->delete();
                return redirect()->back()->with('success',"Income Deleted");
    }
}
