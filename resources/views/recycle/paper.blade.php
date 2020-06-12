@extends('layouts.layout')
@section('content')
<div id="contentPaper">
    <div id="contentInfo" class="textInfo about">
    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p >{!! \Session::get('success') !!}</p>
                        </div>
                    @endif
                    <div style="width:300px; height:25px;">
    <a class="create" href="{{ route('addPaper') }}"><span>Sukurti</span></a>
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
    <a class = "edit" href="{{route('editPaper', $all->id)}}"><span>Redaguoti</span></a>
</div>
<div id = "bloc2">
    <a class="delete" onclick="javascript:return confirm('Bus pašalinti visi susiję įrašai. Ar tikrai norite pašalinti?')" href="{{route('deletePaper', $all->id)}}" >
    <span>Pašalinti</span></a>
</div>
</div>
    </td>
  </tr>
  @endforeach
</table>
</div>
    </div>
    <div id="contentInfo" class="textInfo">
    <h1>Popierius</h1>
    <p>Kasmet kiekvieno lietuvio buityje susidaro vidutiniškai po 19,7 kilogramų popieriaus ir kartono pakuočių atliekų, laikraščių ir kitos makulatūros vienam žmogui. Tačiau išrūšiuojama ir perdirbėjams perduodama 3,6 kilogramai arba tik apie 20 procentų šių atliekų. Likusi didžioji dalis popieriaus atliekų pūva sąvartynuose arba iškeliauja dūmeliu pro namelio kaminą.<br>
    Popieriaus pagrindą sudaro supinti ilgi celiuliozės plaušeliai. Gaminant popierių, reikia atskirti celiuliozę nuo kitų junginių, esančių medienoje. Norint pagaminti vieną kilogramą popieriaus, reikia ne mažiau kaip 60 litrų vandens. Perdirbant popierių, sunaudojama mažiau cheminių medžiagų, iki 80 % mažiau vandens, iki 65 % mažiau energijos, o oro tarša sumažinama net 95 % lyginant su medienos gamyba.<br>
Popieriaus (kartono) perdirbimas nėra begalinis ciklas. Kiekvienas perdirbimo procesas mažina plaušelių ilgį. Ilgainiui popieriaus plaušeliai pasidaro tokie maži, kad neįmanoma jų sulipinti be papildomų medžiagų ar pirminės žaliavos – celiuliozės. Popieriaus (kartono) atliekas, priklausomai nuo popieriaus (kartono) rūšies, galima perdirbti 4-6 kartus.</p></div>	
    </div>
</div>	
@endsection