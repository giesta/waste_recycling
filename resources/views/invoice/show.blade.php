@extends('layouts.layout')
@section('content')
<div id="content" style="width:100%">
			
<div id="contentLeft">
				
    <div id="contentInvoice" class="textInfo about"> 
        @if($invoice != null)       
    <h1>Sąskaita nr. {{$invoice->id}}</h1>
    <p>
    Klientas: {{$invoice->client_name}}<br>
    Adresas: {{$invoice->client_address}}<br>
    Tel. numeris: {{$invoice->client_number}}<br>
    Kodas: {{$invoice->client_code}}<br>
    </p>
    <p>Sąskaitą išrašė: {{$invoice['user']->name}} {{$invoice['user']->last_name}}</p> 
    @endif
<table id="table" style="width:100%">
  <tr>
  <th>Nr.</th>
  <th>Žaliava</th>
    <th>Rūšis</th>
    <th>Kaina</th>
    <th>Kiekis</th>
  </tr>
  @if($lines!=null)
  <?php
  $i =1;
  ?> 
  @foreach($lines as $line)
   <tr>
   <td>{{$i++}}</td>
   <td>{{$line['stocks']->name}}</td>
   <td>{{$line['stocks']['kinds']->name}}</td>
   <td>{{$line->price}}</td>
   <td>{{$line->amount}}</td>    
  </tr>
  @endforeach
  @endif
  
</table>
<div style="">
<div align="center" style="float: right;color:black; background-color: white; width: 300px; border-style: solid; margin: auto;
  border: 3px solid black;">
      <p>Suma: {{$invoice->total_sum}} EUR</p> 
      
      </div>
      </div>        
			</div>
			
                
			</div>
		</div>	
@endsection