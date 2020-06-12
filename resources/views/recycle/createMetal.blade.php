
@extends('layouts.layout')
@section('content')
<div id="contentMetal">
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('insertMetal') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Pavadinimas</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Kaina</label>
                                <div class="col-75">
                                    <input type="text" class="form-control" name="price" value="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <button type="submit" class="create">
                                        Pridėti
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
    <h1>Metalas</h1>
    <p>Gaminant metalą sunaudojama daug energijos ir išskiriami didžiuliai šiltnamio dujų kiekiai, kurie yra tiesioginiai klimato kaitos ir pasaulinio atšilimo kaltininkai. Todėl perdirbant metalą yra tausojami ne tik gamtiniai ištekliai, bet ir mažiau teršiama gamta bei taupoma energija. Didžiausia kenksmingų medžiagų koncentracija išleidžiama į aplinką ne metalams yrant, o būtent per metalo gamybos procesus. Metalą galima perdirbti neribotai – jo pagrindinės savybės nekinta, o perdirbant sunaudojama daug mažiau energijos negu gaminant iš rūdos. Perdirbant sunaudojama mažiau priminių žaliavų, dėl to mažėja metalo kasybos ir rūdos transportavimo daromas poveikis aplinkai.  
        </p></div>
</div>
</div>	
@endsection