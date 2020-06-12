@extends('layouts.layout')
@section('content')
<div id="contentMetal">
    <div id="contentInfo" class="textInfo about">
    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p >{!! \Session::get('success') !!}</p>
                        </div>
                    @endif
                    <div style="width:300px; height:25px;">
    <a class="create" href="{{ route('addMetal') }}"><span>Sukurti</span></a>
</div>
        <div class="slogan"><table id="table" style="width:100%">
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
    <a class = "edit" href="{{route('editMetal', $all->id)}}"><span>Redaguoti</span></a>
</div>
<div id = "bloc2">
    <a class="delete" onclick="javascript:return confirm('Bus pašalinti visi susiję įrašai. Ar tikrai norite pašalinti?')" href="{{route('deleteMetal', $all->id)}}" >
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
    <h1>Metalas</h1>
    <p>Gaminant metalą sunaudojama daug energijos ir išskiriami didžiuliai šiltnamio dujų kiekiai, kurie yra tiesioginiai klimato kaitos ir pasaulinio atšilimo kaltininkai. Todėl perdirbant metalą yra tausojami ne tik gamtiniai ištekliai, bet ir mažiau teršiama gamta bei taupoma energija. Didžiausia kenksmingų medžiagų koncentracija išleidžiama į aplinką ne metalams yrant, o būtent per metalo gamybos procesus. Metalą galima perdirbti neribotai – jo pagrindinės savybės nekinta, o perdirbant sunaudojama daug mažiau energijos negu gaminant iš rūdos. Perdirbant sunaudojama mažiau priminių žaliavų, dėl to mažėja metalo kasybos ir rūdos transportavimo daromas poveikis aplinkai.  
        </p>     
  
    </div>
</div>
@endsection