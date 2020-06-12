@extends('layouts.layout')
@section('content')
<div id="content">
			
			<div id="contentLeft">
                <div class="slogan"><h1>Švari aplinka - tvari ateitis</h1>
                <a href="/"><i class="fas fa-info-circle"></i> Sužinok daugiau</a>
                </div>
                
			</div>
			<div id="contentRight">
                <a href="/metal" >
				<div id="contentBox">			
				<img src="{{url('/images/metal3.jpg')}}" alt="Metal">                    
                        <div class=" text ">Metalas</div>
			</div>
                    </a>
                <a href="/plastic" >
                <div id="contentBox">			
				<img src="{{url('/images/plastic.jpg')}}" alt="Plastic">
                        <div class=" text ">Plastikas</div>
			</div>
                    </a>
                <a href="/paper" >
                <div id="contentBox">                    
				<img src="{{url('/images/paper.jpg')}}" alt="Paper">
                        <div class=" text ">Popierius</div>                    
			</div>
                    </a>
                <a href="/glass" >
                <div id="contentBox">                    
                    <img src="{{url('/images/glass3.jpg')}}" alt="Glass">
                       <div class=" text ">Stiklas</div>
			</div>
                    </a>
			</div>
		</div>
        @endsection