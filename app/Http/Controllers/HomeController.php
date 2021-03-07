<?php

namespace App\Http\Controllers;

use App\model\Transaksi;
use App\User;
use Illuminate\Http\Request;

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
        $users = User::count();
        $transaksi = Transaksi::count();
        $income = Transaksi::where('kategori','income')->sum('nominal');
        $expense= Transaksi::where('kategori','expense')->sum('nominal');

        $widget = [
            'users' => $users,
            'transaksi'=>$transaksi,
            'income' =>$income,
            'expense'=>$expense
            //...
        ];
        return view('home', compact('widget'));
    }
}
