<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kind;
use App\Stock;
use App\Line;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class GlassController extends Controller
{
    public function index()
    {
      $stocksOfGlass = Kind::with('stocks')->where('name', 'stiklas')->first();
      //dd($stocksOfMetal);
      $stocks = $stocksOfGlass['stocks'];
      $kind = $stocksOfGlass->name;
      return view('recycle/glass', compact('stocks', ['kind' => 'kind']));
    }
    public function create()
    {
      return view('recycle/createGlass');
    }
    public function insertGlass(Request $request)
    {
      $kind = Kind::where('name', 'stiklas')->first();
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
        return Redirect::to('/glass')->with('success', 'Žaliava pridėta');
    }
    public function deleteGlass($id)
    {
        Line::where('stock_id', $id)->delete();
        Stock::find($id)->delete();
        return Redirect::to('/glass ')->with('success', 'Žaliava pašalinta');
    }
    public function editGlass($id)
    {
        $selectedStock = Stock::find($id);
        return view('recycle/editGlass', compact('selectedStock'));
    }
    public function confirmEditGlass(Request $request, $id)
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
        return Redirect::to('/glass')->with('success', 'Žaliava atnaujinta');
    }
}
