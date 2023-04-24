<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Income;
use App\Models\Outcome;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\Supplier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showDashboard()
    {
        $daily_income_amount = Income::whereDay('date',Carbon::now())->sum('amount');
        $daily_outcome_amount = Outcome::whereDay('date',Carbon::now())->sum('amount');
        $users = User::count();
        $products = Product::count();

        //sale count by month
        $months=[date('F')];
        $yearMonth=[
            [
                'year'=>date('Y'),
                'month'=>date('m')
                ]
            ];
        //income out come by date
        $daymonth = [date('F d')];
        $dateWithMonth = [
            [
                'month'=>date('m'),
                'day'=>date('d')
            ]
            ];


            for($i = 1 ;$i <=5; $i ++){

            //sale count by month
            $months[]=date('F',strtotime("-$i month"));
            $yearMonth[] = [
                'year'=>date('Y',strtotime("-$i month")),
                'month'=>date('m',strtotime("-$i month"))
            ];

            //income out come by date
            $daymonth[] = date('F d',strtotime("-$i day"));
            $dateWithMonth[]=[
                'month'=>date('m',strtotime("-$i day")),
                'day'=>date('d',strtotime("-$i day"))
            ];
        }


        //sale count by month
        $saleProducts=[];
        foreach($yearMonth as $ym){
            $saleProducts[] =ProductOrder::whereYear('created_at',$ym['year'])->whereMonth('created_at',$ym['month'])->count();
        }

        //income out come by date
        $incomeData=[];
        $outcomeData=[];
        foreach($dateWithMonth as $dwm){
            $incomeData[]=Income::whereMonth('date',$dwm['month'])->whereDay('date',$dwm['day'])->sum('amount');
            $outcomeData[]=Outcome::whereMonth('date',$dwm['month'])->whereDay('date',$dwm['day'])->sum('amount');
        }

        //latest users
        $latest_users= User::latest()->take(5)->get();
        //products lower than 5
        $product_instokes = Product::latest()->where('total_quantity','<','6')->take(5)->get();
        // admins
        $admins= Admin::latest()->take(5)->get();
        //Suppliers
        $suppliers = Supplier::latest()->take(5)->with('addTransaction','removeTransaction')->get();

        return view('admin.dashboard',compact('daily_income_amount','daily_outcome_amount','users','products',
        'months','saleProducts','daymonth','incomeData','outcomeData','latest_users','product_instokes','admins','suppliers'));
    }

// admin Login Logout
    public function showLogin()
    {
        return view('admin.login');
    }
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }
    public function login()
    {
        request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $cre = request()->only('email','password');

        if(auth()->guard('admin')->attempt($cre)){
            return redirect('/admin')->with('success','Welcome To Admin!');;
        }
        return redirect()->back()->with('error','Email And Password Does not Match');
    }

    // admin Profile

    public function admin(){
        return view('admin.account.profile');
    }
}
