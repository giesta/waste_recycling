@extends('layouts.layout')
@section('content')
<div id="content">
			
			<div id="contentLeft">
				
                <div id="contentInfoAbout" class="textInfo about">
    <h1>Kontaktai</h1>
    <p>Su mumis galite susisiekti žemiau nurodytais kontaktais.<br>
    Būstinės adresas: Užupio g. 15, Kaunas<br>
    Telefonas: +37060000001<br>
    Elektroninis paštas: info@perdirbam.lt<br><br>
    Laikas: {{session('time')}}</p>
    </div>
    
                
			</div>
			<div id="contentRight">
      @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p >{!! \Session::get('success') !!}</p>
                        </div>
                    @endif
      <div class="slogan">
      
                    <div style="width:300px; height:25px;">
    <a class="create" href="{{ route('addUser') }}"><span>Sukurti</span></a>
</div>
    <table id="table" style="width:100%">
<tr>
  <th>Vardas</th>
  <th>Pavardė</th>
  <th>E-paštas</th>
  <th>Veiksmai</th>
</tr>
@foreach($users as $all )
 <tr>
  <td>{{$all->name}}</td>
  <td>{{$all->last_name}}</td>
  <td>{{$all->email}}</td>
  <td>
  <div id = "block_container">
  <div id = "bloc1">
  <a class = "edit" href="{{route('editUser', $all->id)}}"><span>Redaguoti</span></a>
</div>
<div id = "bloc2">
  <a class="delete" onclick="javascript:return confirm('Bus pašalinti visi susiję įrašai. Ar tikrai norite pašalinti?')" href="{{route('deleteUser', $all->id)}}" >
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
		</div>	
@endsection