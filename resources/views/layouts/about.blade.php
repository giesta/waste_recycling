@extends('layouts.layout')
@section('content')
<div id="content">
			
			<div id="contentLeft">
				
                <div id="contentInfoAbout" class="textInfo about">
    <h1>Apie mus</h1>
    <p>Daugelį buityje susidarančių atliekų galima perdirbti, todėl svarbu susidarius atliekoms, jomis tinkamai pasirūpinti iš anksto ir perduoti atliekų tvarkytojams. IĮ „Perdirbam“ kartu su partneriais sukūrė projektą perdirbam.lt tam, kad Lietuvos gyventojai bei įmonės rastų informaciją apie atliekas, jų pridavimo galimybes ir tvarkymą mūsų įmonėje.<br>
    Išsaugokime gamtą kartu!</p></div>
                
			</div>
			<div id="contentRight">
				
                <div id="contentBoxAbout">			
				<img src="{{url('/images/plasticRecycling.png')}}" alt="Plastic">
			</div>
                <div id="contentBoxAbout">			
				<img src="{{url('/images/metal3.jpg')}}" alt="Metal">
			</div>
                <div id="contentBoxAbout">                    
				<img src="{{url('/images/paper2.jpg')}}" alt="Paper">                  
			</div>
                <div id="contentBoxAbout">                    
                    <img src="{{url('/images/glass4.jpg')}}" alt="Glass">
			</div>
			</div>
		</div>
@endsection