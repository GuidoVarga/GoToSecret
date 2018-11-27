<body class="artists">
	<section class="content_breadcrumb d-flex justify-content-center align-items-center">
		<div class="contener-center-center">
			<div class="container">
				<h2>Artistas</h2>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row mt-5 ">
			<div class="mx-auto col-12 col-md-6 col-lg-4">
				<div class="form-group group-search">
						<span class="fas fa-search form-control-search"></span>
						<input id="search" type="search" name="search" class="form-control" onkeyup="searchArtist()" placeholder="Buscar Artista">
				</div>
			</div>	
		</div>
		<div class="row" id="myItems">
			<?php if(isset($artists)){
				foreach ($artists as $artist) {?>
			<div class="col-12 col-md-6 col-lg-6 contener-card">
				<div class="card mt-5 mx-auto ">
					<img class="card-img-top" src="<?php echo IMAGES.$artist->getImg()?>" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title"><?php echo $artist->getName();?></h5>
					</div>
					<div class="card-footer">
						<a href="<?php echo 'ArtistDetail?id='.$artist->getId() ?>" class="btn btn-all">+info</a>
					</div>
				</div>
			</div>

			<?php 
				}
			}

			?>
		</div>
	</div>	
</body>