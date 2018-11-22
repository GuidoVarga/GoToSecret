<body class="events">
	<section class="content_breadcrumb d-flex justify-content-center align-items-center">
		<div class="contener-center-center">
			<div class="container">
				<h2>Eventos</h2>
			</div>
		</div>
	</section>
    <div class="container">
		<div class="row mt-5">
			<div class="mx-auto col-12 col-md-6 col-lg-4">
				<div class="form-group group-search">
						<span class="fas fa-search form-control-search"></span>
						<select id="search" name="search" class="form-control" onchange="searchCategory()">
							<option value="">Selecciona una Categoría</option>
							<option value="Entretenimiento">Entretenimiento</option>
						</select>
				</div>
			</div>	
		</div>
		<div class="row" id="myItems">
			<div class="col-12 col-md-6 col-lg-6 contener-card">
				<div class="card mt-5 mx-auto ">
					<img class="card-img-top" src="<?php ROOT ?>resources/images/card1.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Card one</h5>
						<p class="card-text">Especiales</p>
					</div>
					<div class="card-footer">
						<a href="#" class="btn btn-all">+info</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-6 contener-card">
				<div class="card mt-5 mx-auto">
					<img class="card-img-top" src="<?php ROOT ?>resources/images/card2.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Card two</h5>
						<p class="card-text">Entretenimiento</p>
						
					</div>
					<div class="card-footer">
						<a href="#" class="btn btn-all">+info</a>
					</div>
				</div>
			</div>
		</div>
	</div>		
</body>