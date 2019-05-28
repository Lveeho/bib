<?php

namespace App\Http\Controllers;

use App\Barcode;
use App\Rental;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role=Auth::user()->status;
            if ($role === 1){
                $rentals=Rental::paginate(10);
                $users=User::all();
                $barcodes=Barcode::all();
                return view('admin.index',compact('rentals','users','barcodes'));
            }elseif ($role===2){
                $rentals=Rental::where('user_id',Auth::user()->id)->paginate(10);
                $users=User::all();
                $barcodes=Barcode::all();
                return view('admin.index',compact('rentals','users','barcodes'));
            }
    }
}
