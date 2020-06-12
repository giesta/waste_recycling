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

      <h1 class="align">Redaguoti informaciją</h1>
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('confirmEditUser', $selectedUser->id) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Vardas</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" value="{{$selectedUser->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Pavardė</label>
                                <div class="col-75">
                                    <input type="text" class="form-control" name="last_name" value="{{$selectedUser->last_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">E-paštas</label>
                                <div class="col-75">
                                    <input type="email" class="form-control" name="email" value="{{$selectedUser->email}}">
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
@endsection