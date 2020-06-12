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
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('confirmEditGlass', $selectedStock->id) }}">
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
