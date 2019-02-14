<body class="order_confirmed">
	
<section>
	<input id="qr-value" value="" hidden/>
	<div class="container order_confirmed-container" style="min-height: 487px;">
			<div align="center">
				<h2>Tu compra ha sido confirmada!</h2>
				<h5>Tu número de orden es: <span class="text-warning h4"> # <?php echo $orderId?></span></h5>
				
			<div>
			<div id="qrcode" align="center">
			
			</div>
			<h6 class="mt-3">Te hemos enviado tus entradas por email.</h6>
	
	</div>
</section>
<script src="resources/js/qr/qrcode.js"></script>
</body>
<script>
/*
	String.prototype.replaceAll = function(search, replacement) {
 		let target = this;
  		return target.split(search).join(replacement);
	};
	
	let json = document.getElementById("qr-value").value;
	json=json.replaceAll("'", '"')
	new QRCode(document.getElementById("qrcode"), json);
*/
</script>