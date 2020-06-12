
@extends('layouts.layout')
@section('content')
<div id="contentPaper">
<div id="contentInfo" class="textInfo about">
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
    <div class="slogan">
    
        <h1 class="align">Pridėti naują žaliavą</h1>
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('confirmEditPaper', $selectedStock->id) }}">
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
                                    <button type="submit" class="create">
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
    <div id="contentInfo" class="textInfo">
    <h1>Popierius</h1>
    <p>Kasmet kiekvieno lietuvio buityje susidaro vidutiniškai po 19,7 kilogramų popieriaus ir kartono pakuočių atliekų, laikraščių ir kitos makulatūros vienam žmogui. Tačiau išrūšiuojama ir perdirbėjams perduodama 3,6 kilogramai arba tik apie 20 procentų šių atliekų. Likusi didžioji dalis popieriaus atliekų pūva sąvartynuose arba iškeliauja dūmeliu pro namelio kaminą.<br>
    Popieriaus pagrindą sudaro supinti ilgi celiuliozės plaušeliai. Gaminant popierių, reikia atskirti celiuliozę nuo kitų junginių, esančių medienoje. Norint pagaminti vieną kilogramą popieriaus, reikia ne mažiau kaip 60 litrų vandens. Perdirbant popierių, sunaudojama mažiau cheminių medžiagų, iki 80 % mažiau vandens, iki 65 % mažiau energijos, o oro tarša sumažinama net 95 % lyginant su medienos gamyba.<br>
Popieriaus (kartono) perdirbimas nėra begalinis ciklas. Kiekvienas perdirbimo procesas mažina plaušelių ilgį. Ilgainiui popieriaus plaušeliai pasidaro tokie maži, kad neįmanoma jų sulipinti be papildomų medžiagų ar pirminės žaliavos – celiuliozės. Popieriaus (kartono) atliekas, priklausomai nuo popieriaus (kartono) rūšies, galima perdirbti 4-6 kartus.</p></div>	
    </div>
</div>
</div>	
@endsection