@extends('layouts.layout')
@section('content')
<div id="contentPlastic">
    
<div id="contentInfo" class="textInfo">
    <h1>Plastikas</h1>
    <p>Su naujais atradimais, plastikas tapo neišvengiama gyvenimo dalimi. Stiklui ir metalui neprilygstančios plastiko pakuotės tapo gyvenimo dalimi. Plastmasės naudojimas medicinoje išsaugo daug gyvybių, talpina viską – nuo kraujo iki vandens. Kadangi plastikas yra kasdieninė mūsų dalis, su laiku buvo atrasti jo pavojai. Plastikas tūkstančius metų nesuyra. Kaupimas sąvartynuose, ir netgi plastiko deginimas retai atliekamas saugiai. Nors gamtoje plastikas ilgai neyra, jame pasitaikančios medžiagos, kaip dioksinas deginant greitai plinta ore ir vandenyje. <br>
    Atsižvelgiant, sveikatos problemų gausa ir įvairovė priklauso nuo plastiko tipo, kiek ir kaip greitai organizmas pasisavina kenksmingas medžiagas. Kai kurie plastikai sveikatai problemų nesukelia. Bet keli plastikai gali turėti toksinių medžiagų, kurios pamažu kaupiasi organizme riebaliniuose audiniuose. Bisfenolis matuojamas ir aptinkamas seilėse arba moters piene. Dar negimus kūdikiai beveik visi turi bisfenolio – sako JAV tyrimai. Vaikams augant, kenksmingos medžiagos išsilaiko, su metais kaupiasi.</p>
    </div>	
    
    <div id="contentInfo" class="textInfo about">
    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p >{!! \Session::get('success') !!}</p>
                        </div>
                    @endif
                    <div style="width:300px; height:25px;">
    <a class="create" href="{{ route('addPlastic') }}"><span>Sukurti</span></a>
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
    <a class = "edit" href="{{route('editPlastic', $all->id)}}"><span>Redaguoti</span></a>
</div>
<div id = "bloc2">
    <a class="delete" onclick="javascript:return confirm('Bus pašalinti visi susiję įrašai. Ar tikrai norite pašalinti?')" href="{{route('deletePlastic', $all->id)}}" >
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
</div>
		
@endsection