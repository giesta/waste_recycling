@extends('layouts.layout')
@section('content')
<div id="contentGlass">
<div id="contentInfo" class="textInfo">
    <h1>Stiklas</h1>
    <p>Visos stiklo atliekos gali būti perdirbamos – iš kilogramo stiklo šukių galima pagaminti kilogramą naujo
stiklo, kurio kokybė ne prastesnė nei gaminamo iš pirminių žaliavų. Stiklą galima
perdirbti neribotą kiekį kartų ir iš jo vis gaminti naujus gaminius. Tačiau išmestas gamtoje butelis ar
stiklainis tampa beveik amžina šiukšle, kuri suirs geriausiu atveju po 900 metų. Palyginti su naujo stiklo
gamyba, perdirbimo nauda gamtai neabejotina – sutaupoma 35–40% gamybai reikalingų energijos išteklių ir
gausybė smėlio, klinčių, natrio karbonato, apie 50% sumažinama vandens tarša. Perdirbus toną stiklo atliekų
išvengiama maždaug 315 kg anglies dvideginio dujų, todėl mažėja atmosferos užterštumas šiltnamio dujomis.</p></div>	
    <div id="contentInfo" class="textInfo about">
    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p >{!! \Session::get('success') !!}</p>
                        </div>
                    @endif
                    <div style="width:300px; height:25px;">
    <a class="create" href="{{ route('addGlass') }}"><span>Sukurti</span></a>
</div>
    <div class="slogan">
    <table id="table" style="width:100%">
  <tr>
    <th>Pavadinimas</th>
    <th>Rūšis</th>
    <th>Kaina</th>
    <th>Veiksmai</th>
  </tr>
  @foreach($stocks as $all )
   <tr>
    <td>{{$all->name}}</td>
    <td>{{$kind}}</td>
    <td>{{$all->price}}</td>
    <td>
    <div id = "block_container">
    <div id = "bloc1">
    <a class = "edit" href="{{route('editGlass', $all->id)}}"><span>Redaguoti</span></a>
</div>
<div id = "bloc2">
    <a class="delete" onclick="javascript:return confirm('Bus pašalinti visi susiję įrašai. Ar tikrai norite pašalinti?')" href="{{route('deleteGlass', $all->id)}}" >
    <span>Pašalinti</span></a>
</div>
</div>
    </td>
  </tr>
  @endforeach
</table>
</div>
    </div>
</div>	
@endsection