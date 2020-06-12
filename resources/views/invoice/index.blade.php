@extends('layouts.layout')
@section('content')

<div id="content" class="contentInvoiceCenter">
@if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p >{!! \Session::get('success') !!}</p>
                        </div>
                    @endif
                    <div style="width:300px; height:25px;">
    <a class="create" href="{{ route('addInvoice') }}" style = "margin:10px 10px"><span>Sukurti</span></a>
</div>
			<div id="contentInvoiceInfo">
				
      <div id="contentInvoiceInfo">
      <table id="table" style="width:100%">
  <tr>
  <th>
    Nr.
  </th>
    <th>Data</th>
    <th>Klientas</th>
    <th>Suma</th>
    <th>Veiksmai</th>
  </tr>
  @foreach($invoices as $all )
   <tr>
   <td><a href="{{route('invoices.show', $all->id)}}">{{$all->id}}</a></td>
    <td>{{$all->date}}</td>
    <td>{{$all->client_name}}</td>
    <td>{{$all->total_sum}}</td>
    <td>
    <div id = "block_container">
    <div id = "bloc1">
    <a class = "edit" href="{{route('editInvoice', $all->id)}}"><span>Redaguoti</span></a>
</div>
<div id = "bloc2">
    <a class="delete" onclick="javascript:return confirm('Bus pašalinti visi susiję įrašai. Ar tikrai norite pašalinti?')" href="{{route('deleteInvoice', $all->id)}}" >
    <span>Pašalinti</span></a>
</div>
</div>
    </td>
  </tr>
  @endforeach
  
</table>
{{$invoices->links()}}
                
			</div>
			
                
			</div>
</div>	
@endsection