<html>
	<head>
		<title>Open in Whatsapp</title>
		
		<!-- CSS Libs-->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="css/intlTelInput.css" rel="stylesheet" id="country-css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<style>
			.iti-flag {
				background-image: url("img/flags.png");
			}

			@media only screen and (-webkit-min-device-pixel-ratio: 2),
				only screen and (min--moz-device-pixel-ratio: 2),
				only screen and (-o-min-device-pixel-ratio: 2 / 1), 
				only screen and (min-device-pixel-ratio: 2), 
				only screen and (min-resolution: 192dpi), 
				only screen and (min-resolution: 2dppx) {
					.iti-flag {background-image: url("img/flags@2x.png");
				}
			}
			
			.intl-tel-input {
				width: 100%;
			}
			
			.centered {
				position: fixed;
				width:80%;
				border-style: dotted;
				top: 50%;
				left: 10%;
				right: -10%;
			}
		</style>
	</head>
	
	<body>
		<div class="centered">
			<div class="row">
				<div class="col-sm-12 col-lg-8">
					<input type="tel" id="telefone" class="form-control">
				</div>
				<div class="col-sm-12 col-lg-4">
					<button type="button" class="btn btn-block btn-success" id="send"><i class="fas fa-external-link-alt"></i> Open</button>
				</div>
			</div>
		</div>
	</body>
	
	<!-- JS Libs -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/jquery.mask.js"></script>
	<script src="js/intlTelInput.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){		
			$("#telefone").intlTelInput({
				initialCountry: "auto",
				geoIpLookup: function(callback) {
					$.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
					  var countryCode = (resp && resp.country) ? resp.country : "";
					  callback(countryCode);
					});
				},
				utilsScript: "js/utils.js"
			});
			
			$("#telefone").keyup(function(data){
				if(data.key == "Enter"){
					tel = $("#telefone").cleanVal();
					pais = $("#paises").val();
					console.log(tel, pais);
				}
			});
			
			$("#send").click(function(){
				tel = $("#telefone").intlTelInput("getNumber");
				window.open('http://api.whatsapp.com/send?1=pt_BR&phone='+tel.replace("+",""), '_blank');
			});
		});
	</script>
</html>
