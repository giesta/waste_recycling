@extends('layouts.layout')
@section('content')
<div id="contentPlastic">
    
<div id="contentInfo" class="textInfo">
    <h1>Plastikas</h1>
    <p>Su naujais atradimais, plastikas tapo neišvengiama gyvenimo dalimi. Stiklui ir metalui neprilygstančios plastiko pakuotės tapo gyvenimo dalimi. Plastmasės naudojimas medicinoje išsaugo daug gyvybių, talpina viską – nuo kraujo iki vandens. Kadangi plastikas yra kasdieninė mūsų dalis, su laiku buvo atrasti jo pavojai. Plastikas tūkstančius metų nesuyra. Kaupimas sąvartynuose, ir netgi plastiko deginimas retai atliekamas saugiai. Nors gamtoje plastikas ilgai neyra, jame pasitaikančios medžiagos, kaip dioksinas deginant greitai plinta ore ir vandenyje. <br>
    Atsižvelgiant, sveikatos problemų gausa ir įvairovė priklauso nuo plastiko tipo, kiek ir kaip greitai organizmas pasisavina kenksmingas medžiagas. Kai kurie plastikai sveikatai problemų nesukelia. Bet keli plastikai gali turėti toksinių medžiagų, kurios pamažu kaupiasi organizme riebaliniuose audiniuose. Bisfenolis matuojamas ir aptinkamas seilėse arba moters piene. Dar negimus kūdikiai beveik visi turi bisfenolio – sako JAV tyrimai. Vaikams augant, kenksmingos medžiagos išsilaiko, su metais kaupiasi.</p>
    </div>	
    
    <div id="contentInfo" class="textInfo about">
    <div class="slogan">
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
        <h1 class="align">Redaguoti žaliavą</h1>
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('confirmEditPlastic', $selectedStock->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Pavadinimas</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" value="{{$selectedStock->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Kaina</label>
                                <div class="col-75">
                                    <input type="text" class="form-control" name="price" value="{{$selectedStock->price}}">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <button type="submit" class="edit">
                                        Redaguoti
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
		
@endsection
