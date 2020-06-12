<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kind;
use App\Stock;
use App\Line;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class MetalController extends Controller
{
    public function index()
    {
      $stocksOfMetal = Kind::with('stocks')->where('name', 'metalas')->first();
      $stocks = $stocksOfMetal['stocks'];
      $kind = $stocksOfMetal->name;
      return view('recycle/metal', compact('stocks', ['kind' => 'kind']));
    }
    public function create()
    {
      return view('recycle/createMetal');
    }
    public function insertMetal(Request $request)
    {
      $kind = Kind::where('name', 'metalas')->first();
        $validator = Validator::make(
            [   'name' =>$request->input('name'),
                'price' =>$request->input('price')
            ],
            [   'name' => 'required',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $stock = new Stock();
            $stock->name  = $request->input('name');
            $stock->price = $request->input('price');
            $stock->kind_id = $kind->id;

            $stock->save();
        }
        return Redirect::to('/metal')->with('success', 'Žaliava pridėta');
    }
    public function deleteMetal($id)
    {
        Line::where('stock_id', $id)->delete();
        Stock::find($id)->delete();
        return Redirect::to('/metal ')->with('success', 'Žaliava pašalinta');
    }
    public function editMetal($id)
    {
        $selectedStock = Stock::find($id);
        return view('recycle/editMetal', compact('selectedStock'));
    }
    public function confirmEditMetal(Request $request, $id)
    {
      $validator = Validator::make(
        [   'name' =>$request->input('name'),
            'price' =>$request->input('price')
        ],
        [   'name' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]
    );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $appendableData = $request->all();

            //pašaliname iš masyvo saugumui naudojamą _token kintamąjį
            unset($appendableData ['_token']);

            $stock = Stock::where('id','=',$id)->update($appendableData);
        }
        return Redirect::to('/metal')->with('success', 'Žaliava atnaujinta');
    }
}
