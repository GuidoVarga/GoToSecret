<body class="order_confirmed">
	
<section>
	<div class="container order_confirmed-container">
			<div align="center">
				<h2>Tu compra ha sido confirmada!</h2>
				<h5>Tu número de orden es: <span class="text-warning h4"> 111</span></h5>
				
			<div>
			<div id="qrcode" align="center">
			
			</div>
			<h6 class="mt-3">Te hemos enviado tu entrada por email.</h6>
	
	</div>
</section>
<script src="resources/js/qr/qrcode.js"></script>
</body>
<script>
	new QRCode(document.getElementById("qrcode"), "http://jindo.dev.naver.com/collie");
</script>