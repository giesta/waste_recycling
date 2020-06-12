<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Stock;
use App\Line;
use App\User;
use App\Kind;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class InvoicesController extends Controller
{
    public function index()
    {
      $invoices = Invoice::paginate(5);
      return view('invoice/index', compact('invoices'));
    }
    
    public function createInvoice()
    {
      $stocks = Stock::with('kinds')->get();
      $users = User::all();
      //dd( $stocks);
      return view('invoice/create', compact('stocks', 'users'));
    }

    public function insertInvoice(Request $request)
    {
      
      
        $validator = Validator::make(
            [   'client_name' =>$request->input('client_name'),
                'client_address' =>$request->input('client_address'),
                'client_number' =>$request->input('client_number'),
                'client_code' =>$request->input('client_code'),
                'client_bank' =>$request->input('client_bank'),
                'date' =>$request->input('date'),
                'total_sum' =>$request->input('total_sum'),
                'amount' =>$request->input('amount'),
                'price' =>$request->input('price'),
                'stock_id' =>$request->input('stock_id'),
                'amount.*' =>$request->input('amount.*'),
                'price.*' =>$request->input('price.*'),
                'stock_id.*' =>$request->input('stock_id.*'),
                'user_id' =>$request->input('user_id')
            ],
            [   'client_name' => 'required',
                'client_address' => 'required',
                'client_number' => 'required',
                'client_code' => 'required',
                'client_bank' => 'required|alpha_num',
                'date' => 'required',
                'total_sum' => 'required||regex:/^\d+(\.\d{1,2})?$/',
                'amount' => 'required|array',
                'price' => 'required|array',
                'stock_id' => 'required|array',
                'amount.*' => 'required|numeric',
                'price.*' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'stock_id.*' => 'required',
                'user_id' => 'required'
          ],
          [     
                'amount.*' => 'Kiekis privalomas ir turi būti sveikasis skaičius',
                'price.*' => 'Kaina yra būtina ir turi būti skaičius',
                'stock_id.*' => 'Žaliavą būtina nurodyti',
                'user_id' => 'Darbuotojas turi būti nurodytas'
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $invoice = new Invoice();
            $invoice->client_name  = $request->input('client_name');
            $invoice->client_address  = $request->input('client_address');
            $invoice->client_number = $request->input('client_number');
            $invoice->client_code  = $request->input('client_code');
            $invoice->client_bank  = $request->input('client_bank');
            $invoice->date  = $request->input('date');
            $invoice->total_sum = $request->input('total_sum');
            $invoice->user_id = $request->input('user_id');
            $invoice->save();
            for ($i = 0; $i < count($request->input('amount')); $i++) {
              $line = new Line();
              $line->amount = $request->input('amount')[$i];
              $line->price = $request->input('price')[$i];
              $line->stock_id = $request->input('stock_id')[$i];
              $line->invoice_id = $invoice->id;
              $line->save();
            }
           
        }
        return Redirect::to('/invoices')->with('success', 'Sąskaita patvirtinta');
    }
    public function show($id)
    {
      $invoice = Invoice::with('user')->with('lines.stocks.kinds')->find($id);
      $lines = $invoice['lines'];
      return view('invoice/show', compact('invoice', 'lines'));
    }
    public function deleteInvoice($id)
    {
        Line::where('invoice_id','=',$id)->delete();
        Invoice::find($id)->delete();
        return Redirect::to('/invoices ')->with('success', 'Sąskaita pašalinta');
    }
    
    public function editInvoice($id)
    {
      $invoice = Invoice::with('user')->with('lines.stocks.kinds')->find($id);
      $lines = $invoice['lines'];
        $stocks = Stock::with('kinds')->get();
        $users = User::all();
        return view('invoice/edit', compact('invoice', 'lines','stocks', 'users'));
    }
    public function confirmEditInvoice(Request $request, $id)
    {
      $validator = Validator::make(
        [   'client_name' =>$request->input('client_name'),
            'client_address' =>$request->input('client_address'),
            'client_number' =>$request->input('client_number'),
            'client_code' =>$request->input('client_code'),
            'date' =>$request->input('date'),
            'total_sum' =>$request->input('total_sum'),
            'amount' =>$request->input('amount'),
            'price' =>$request->input('price'),
            'stock_id' =>$request->input('stock_id'),
            'amount.*' =>$request->input('amount.*'),
            'price.*' =>$request->input('price.*'),
            'stock_id.*' =>$request->input('stock_id.*'),
            'user_id' =>$request->input('user_id')
        ],
        [   'client_name' => 'required',
            'client_address' => 'required',
            'client_number' => 'required',
            'client_code' => 'required',
            'date' => 'required',
            'total_sum' => 'required||regex:/^\d+(\.\d{1,2})?$/',
            'amount' => 'required|array',
            'price' => 'required|array',
            'stock_id' => 'required|array',
            'amount.*' => 'required|numeric',
            'price.*' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'stock_id.*' => 'required',
            'user_id' => 'required'
      ],
      [     
        'amount.*' => 'Kiekis privalomas ir turi būti sveikasis skaičius',
        'price.*' => 'Kaina yra būtina ir turi būti skaičius',
        'stock_id.*' => 'Žaliavą būtina nurodyti',
        'user_id' => 'Darbuotojas turi būti nurodytas',
        'total_sum' => 'Suma privaloma',
    ]
    );
    if ($validator->fails())
    {
        return Redirect::back()->withErrors($validator);
    }
    else
    {
        $invoice = Invoice::find($id);
        $invoice->client_name  = $request->input('client_name');
        $invoice->client_address  = $request->input('client_address');
        $invoice->client_number = $request->input('client_number');
        $invoice->client_code  = $request->input('client_code');
        $invoice->date  = $request->input('date');
        $invoice->total_sum = $request->input('total_sum');
        $invoice->user_id = $request->input('user_id');
        $invoice->save();
        Line::where('invoice_id','=',$id)->delete();
        for ($i = 0; $i < count($request->input('amount')); $i++) {
          $line = new Line();
          $line->amount = $request->input('amount')[$i];
          $line->price = $request->input('price')[$i];
          $line->stock_id = $request->input('stock_id')[$i];
          $line->invoice_id = $invoice->id;
          $line->save();
        }
       
    }
        return Redirect::to('/invoices')->with('success', 'Sąskaita atnaujinta');
    }
}
