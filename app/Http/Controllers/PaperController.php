<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kind;
use App\Stock;
use App\Line;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class PaperController extends Controller
{
    public function index()
    {
      $stocksOfPlastic = Kind::with('stocks')->where('name', 'popierius')->first();
      //dd($stocksOfMetal);
      $stocks = $stocksOfPlastic['stocks'];
      $kind = $stocksOfPlastic->name;
      return view('recycle/paper', compact('stocks', ['kind' => 'kind']));
    }
    public function create()
    {
      return view('recycle/createPaper');
    }
    public function insertPaper(Request $request)
    {
      $kind = Kind::where('name', 'popierius')->first();
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
        return Redirect::to('/paper')->with('success', 'Žaliava pridėta');
    }
    public function deletePaper($id)
    {
        Line::where('stock_id', $id)->delete();
        Stock::find($id)->delete();
        return Redirect::to('/paper ')->with('success', 'Žaliava pašalinta');
    }
    public function editPaper($id)
    {
        $selectedStock = Stock::find($id);
        return view('recycle/editPaper', compact('selectedStock'));
    }
    public function confirmEditPaper(Request $request, $id)
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
        return Redirect::to('/paper')->with('success', 'Žaliava atnaujinta');
    }
}
