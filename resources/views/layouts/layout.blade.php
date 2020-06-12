<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>perdirbam.lt</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/fdab679618.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
	<script type="text/javascript">
		$(document).ready(function() {
	  		// čia rašomas JQuery kodas
		  	$('#contentLeft h2').mouseover(function() { // užvedus pelyte
		  		$(this).css('cursor', 'pointer'); // pakeičiamas pelytės žymeklis
		  	});
	  		
	  		$('#contentLeft h2').click(function() { // paspaudus contentLeft h2 elem.
				$('#contentLeft ul').slideToggle(); // slepiamas/rodomas ul meniu elem.
			});
		});
	</script>
    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body>
	<div id="body">		
            <div class="topnav">
                <h1 >perdirbam.lt</h1><img src="{{url('/images/recycle.png')}}" WIDTH=50 HEIGHT=65/> 
  <a class="{{ Request::path() === 'contact' ? 'active' : ''}}"href="/contact">Kontaktai</a>
  <a class="{{ Request::path() === 'invoices' ? 'active' : ''}}"href="/invoices">Sąskaitos</a>
  <a class="{{ Request::path() === 'glass' ? 'active' : ''}}" href="/glass">Stiklas</a>
  <a class="{{ Request::path() === 'paper' ? 'active' : ''}}" href="/paper">Popierius</a>
  <a class="{{ Request::path() === 'plastic' ? 'active' : ''}}" href="/plastic">Plastikas</a>
  <a class="{{ Request::path() === 'metal' ? 'active' : ''}}" href="/metal">Metalas</a>
  <a class="{{ Request::path() === 'recyclable' ? 'active' : ''}}" href=/recyclable>Perdirbam</a>                
  <a class="{{ Request::path() === '/' ? 'active' : ''}}" href='/'>Apie mus</a>
</div>
<div class="col-12 col-md-9">
                    
                    @yield('content')
    </div>

        <div id="footer">
            <div id="contactAdress">
                <h2>Kontaktai:</h2>
                <i class="fas fa-home"></i> Užupio g. 15, Kaunas <br>
                <i class="fas fa-phone-square-alt"></i> +37060000001<br>
                <i class="fas fa-envelope-open"></i> info@perdirbam.lt
            </div>
            <div id="mission">Daugelį buityje susidarančių atliekų galima perdirbti, todėl svarbu susidarius atliekoms, jomis tinkamai pasirūpinti iš anksto ir perduoti atliekų tvarkytojams. Mūsų misija palengvinti tai ir užtikrinti tvarią ateitį mums visiems.
                <a id="aText" href='/'><i class="fas fa-info-circle"></i>  Apie mus</a>
            </div>
		</div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
	$('#contact').on('input', function() {
        
	var input=$('#fname');
	var is_name=input.val();
	if(is_name==""){
            $('#is_name').removeClass("hidden");
            $('#is_name').addClass("visible");
                   }
        else{
            $('#is_name').removeClass("visible");
            $('#is_name').addClass("hidden");
           input.removeClass("error"); 
        }
        var linput=$('#lname');
        var lname = linput.val();
        if(is_name!="" && lname==""){
            $('#is_last').removeClass("hidden");
            $('#is_last').addClass("visible");
            }else{
            $('#is_last').removeClass("visible");
            $('#is_last').addClass("hidden"); 
        }
        var emailinput=$('#email');
        var email = emailinput.val();
        if(is_name!="" && lname!="" && email ==""){
            $('#is_email').removeClass("hidden");
            $('#is_email').addClass("visible");
            }else{
            $('#is_email').removeClass("visible");
            $('#is_email').addClass("hidden"); 
        }
        var msginput=$('#subject');
        var msg = msginput.val();
        if(is_name!="" && lname!="" && email !="" && msg == ""){
            $('#is_subject').removeClass("hidden");
            $('#is_subject').addClass("visible");
            }else{
            $('#is_subject').removeClass("visible");
            $('#is_subject').addClass("hidden");           
        }
        if(is_name!="" && lname!="" && email !="" && msg != ""){
            $('#send').get(0).type = 'submit';
        }
});
});
    </script>
</body>
</html>