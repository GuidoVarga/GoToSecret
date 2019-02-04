<body>
<section>
	<div class="container order_confirmed-container">
			<div align="center">
				<h2>Tu compra ha sido confirmada</h2>
				<h6>Te hemos enviado tu entrada por email</h6>
			<div>
			<div id="qrcode" align="center">
			
			</div>
	
	</div>
</section>
<script src="resources/js/qr/qrcode.js"></script>
</body>
<script>
	new QRCode(document.getElementById("qrcode"), "http://jindo.dev.naver.com/collie");
</script>