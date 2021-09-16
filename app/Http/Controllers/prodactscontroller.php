<?php

namespace App\Http\Controllers;

use App\Models\carte;
use App\Models\order;
use App\Models\prodact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prodactscontroller extends Controller
{
    public function prodactlist()
    {
        $prodact = prodact::get();

        return view('prodacts/prodactlist', ['prodacts' => $prodact]);
    }

    public function addcart($id)
    {
        $prodacts = prodact::where('id', $id)
        ->get();

        return view('trans/addtocart', ['prodacts' => $prodacts]);
    }

    public function addtocart(Request $request)
    {
        $user = session()->get('user')['id'];
        $cart = new carte();
        $cart->user_id = $user;
        $cart->prodact_id = $request->prodact_id;
        $cart->save();

        return redirect('/');
    }

    public static function carts()
    {
        return carte::all()->count();
    }

    public static function total()
    {
        $userId = session()->get('user')['id'];
        $cartes = DB::table('cartes')
        ->join('prodacts', 'cartes.prodact_id', '=', 'prodacts.id')
        ->where('cartes.user_id', $userId)
        ->select('price')->sum('price');

        return $cartes;
    }

    public function ordernowcarts()
    {
        $userId = session()->get('user')['id'];
        $cartes = DB::table('cartes')
        ->join('prodacts', 'cartes.prodact_id', '=', 'prodacts.id')
        ->where('cartes.user_id', $userId)
        ->select('*')->get();

        return view('trans.buy', ['prodacts' => $cartes]);
    }

    public function cartlist()
    {
        $userId = session()->get('user')['id'];
        $cartes = DB::table('cartes')
        ->join('prodacts', 'cartes.prodact_id', '=', 'prodacts.id')
        ->where('cartes.user_id', $userId)
        ->get();

        return     view('prodacts/cartlist', ['cartslist' => $cartes]);
    }

    public function ordernow(Request $request)
    {
        $userId = session()->get('user')['id'];

        $prodacts = carte::where('user_id', $userId)->get();
        $ordernow = new order();
        foreach ($prodacts as $prodact) {
            $ordernow->user_id = $userId;
            $ordernow->prodact_id = $prodact->prodact_id;
            $ordernow->pymt_method = $request->pymt;
            $ordernow->status = 'pending';
            $ordernow->pymt_status = 'pending';
            $ordernow->address = $request->address;
            $ordernow->save();
            carte::where('user_id', $userId)->delete();
        }

        return redirect('/');
    }

    public function createprodact(Request $request, prodact $prodact)
    {
        // dd($request->input($_FILES));

            $prodact::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'gallery' => $request->input('gallery'),
            'catagory' => $request->input('catagory'),
        ]);

        return redirect('/')->with('sucess', 'prodact posted');
    }
}
