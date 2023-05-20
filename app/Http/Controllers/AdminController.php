<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('backend.index');
    }

    public function add_products(){
        return view('backend.add_products');
    }

    public function ret_products(Request $request){
        $request->validate(
            [
                'products-title'=>'required',
                'products-price'=>'required',
                'products-color'=>'required',
                'products-size'=>'required',
                'products-qty'=>'required',
                'products-category'=>'required',
                'products-pic'=>'required',
            ]
            );
        print_r($request->all());

    }


}
