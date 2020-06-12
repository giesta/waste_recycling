@extends('layouts.layout')
@section('content')
<div id="content" style="width:100%">
@if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p style="width:300px; height:25px; background-color: green;">{!! \Session::get('success') !!}</p>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <p>Jūsų įvedamuose duomenyse yra klaidų:</p>
                            <ul >
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
<div id="contentLeft">
    <div id="contentInvoiceCreate" class="textInfo about"> 
    <form class="form-horizontal" role="form" method="POST" action="{{ route('insertInvoice') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div class="form-group2">
                 <div class="form-group1" style="float:left;">
                    <label class="col-md-4 control-label">Klientas:</label>
                     <div class="col-md-12">
                       <input type="text" class="form-control" name="client_name" value="">
                      </div>
                  </div>
              <div class="form-group1" style="float:left;">
                   <label class="col-md-4 control-label">Adresas:</label>
                   <div class="col-75">
                      <input type="text" class="form-control" name="client_address" value="">
                    </div>
               </div>
               <div class="form-group1" style="float:left;">
                   <label class="col-md-4 control-label">Banko sąskaita:</label>
                   <div class="col-75">
                      <input type="text" class="form-control" name="client_bank" value="">
                    </div>
               </div>
</div>
      <div class="form-group2">
        <div class="form-group1" style="float:left;">
            <label class="col-md-4 control-label">Telefono numeris:</label>
                <div class="col-75">
                     <input type="text" class="form-control" name="client_number" value="">
                </div>
        </div>
       <div class="form-group1" style="float:left;">
            <label class="col-md-4 control-label">Kodas:</label>
            <div class="col-75">
                <input type="text" class="form-control" name="client_code" value="">
            </div>
         </div>
</div>
         <div class="form-group2">
          <div class="form-group1" style="float:left;">
            <label class="col-md-4 control-label">Data:</label>
              <div class="col-75">
                <input type="text" name="date" class="form-control" placeholder="Pasirinkti datą" onfocus="(this.type='date')">
              </div>
</div>
     <div class="form-group1" style="float:left;">
    <label class="col-md-4 control-label">Sąskaitą išrašė: </label>
    <div class="col-75">    
   <select class="form-control" name="user_id">
        @foreach($users as $user)
        <option value="{{$user->getKey()}}"">{{$user->name}} {{$user->last_name}}</option>
           @endforeach
    </select>
   </div>
     </div>
    </div>
                            
<table id="table" style="width:100%">
  <tr>
  <th>Žaliava</th>
    <th>Kaina</th>
    <th>Kiekis</th>
  </tr>
  <?php
  $i =1;
  ?> 
 
   <tr>
   <td><select class="form-control" name="stock_id[]" id="a0">
       @foreach($stocks as $nt)
         <option value="{{$nt->getKey()}}" data-price="{{ $nt->price }}">{{$nt->name}} ({{$nt['kinds']->name}})</option>
         @endforeach
    </select>
</td>
   <td><div class="col-md-12">
        <input id="b0" type="number" class="form-control" id ="price" name="price[]" value=""  onblur="multiplication()" min="0" step="0.01">
        </div></td>
   <td>
   <div class="col-md-12">
         <input id="c0" type="number" class="form-control" name="amount[]" value="" onblur="multiplication()" min="0">
    </div>
   </td>    
  </tr>
  
</table>
<div style="">
<div align="center" style="float: right;color:black; background-color: white; width: 300px; border-style: solid; margin: auto;
  border: 3px solid black;">
      <p id="p1" name= "total_sum">Suma:  EUR</p> 
      <input id="total_sum" type="hidden" class="form-control" name="total_sum" value="">
      </div>
      </div> 
      <div class="form-group1">
            <div class="col-md-12 col-md-offset-4">
                <button type="button" class="edit" onclick="addRow()">
                    Pridėti naują eilutę
                </button>
            </div>
        </div>
        <div class="form-group1">
            <div class="col-md-12 col-md-offset-4">
                <button type="button" class="delete" onclick="deleteFunction()">
                    Trinti paskutinę eilutę
                </button>
            </div>
        </div><br><br>
	
 
            
		<div class="form-group1">
            <div class="col-md-12 col-md-offset-4">
                <button type="submit" class="create" style="margin: 0px 20px;">
                    Patvirtinti
                </button>
            </div>
        </div> 
    </form> 
    </div>  
   </div>            
	</div>
</div>
<script type="application/javascript">
       function addRow() {
  var root = document.getElementById("table");
  var rows = root.rows;
  var rowCount = rows.length;
  var clone = cloneEl(rows[rows.length - 1]);  
  root.appendChild(clone);
  var cols= rows[rows.length - 1].cells;
  //window.alert(cols.length)
  if(rows.length > 1 && cols[0].id == 'a0'){
    renewTable(rows);
  }
  
  cols[0].children[0].children[0].value = "";
  cols[0].children[0].children[0].id = 'a'+(rowCount-1);
  cols[1].children[0].children[0].value = "";
  cols[1].children[0].children[0].id = 'b'+(rowCount-1);
  cols[2].children[0].children[0].value = "";
  cols[2].children[0].children[0].id = 'c'+(rowCount-1);
}
function cloneEl(el) {
  var clo = el.cloneNode(true);
  return clo;
}
function deleteFunction() {
    if(document.getElementById("table").rows.length > 2)
  document.getElementById("table").deleteRow(document.getElementById("table").rows.length - 1);
}
$('#a0').on('change',function(){
    var price = $(this).children('option:selected').data('price');
    $('#price').val(price);
});
renewTable = function(rows){
  for (var i = 1; i < rows.length; ++i) {
               var cols= rows[i].cells;
                cols[0].children[0].children[0].id = 'a'+(i-1); 
                cols[1].children[0].children[0].id = 'b'+(i-1);
                cols[2].children[0].children[0].id = 'c'+(i-1);
            }
}
multiplication = function()
{
    var root = document.getElementById("table");
    var rows = root.rows;
    renewTable(rows);
    if(rows.length > 1 && rows[1].cells[0].id == 'a0'){
    
  }
  var price = 0;
  var amount = 0;
  var total = 0;
    for (var i = 0; i < rows.length-1; ++i) {
        if(document.getElementById('c'+i).value !== "" && document.getElementById('b'+i).value !== ""){
            price = parseFloat(document.getElementById('b'+i).value);
            amount = parseFloat(document.getElementById('c'+i).value); 
            total += price * amount;
        }
    
    //document.getElementById('c'+i).value = (parseFloat(quantity)*parseFloat(rate)).toFixed(2);
    
    }
     document.getElementById("p1").innerHTML = "Viso: "+total.toFixed(2) + " EUR";
     document.getElementById("total_sum").value = total.toFixed(2);
}
</script>	
@endsection