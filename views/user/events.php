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
							<?php if(isset($categories)){
										foreach($categories as $category){?>
							<option value="<?php echo $category->getName();?>"><?php echo $category->getName();?></option>
							<?php 
								}
							}?>
						</select>
				</div>
			</div>	
		</div>
		<div class="row" id="myItems">
			<?php if(isset($events)){
				foreach ($events as $event) {?>
			<div class="event-card col-12 col-md-6 col-lg-6 contener-card">
				<div class="card mt-5 mx-auto ">
					<img class="card-img-top" src="<?php echo IMAGES.$event->getImg()?>" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title"><?php echo $event->getName();?></h5>
						<p class="card-text"><?php echo $event->getEventCategory()->getName();?></p>
					</div>
					<div class="card-footer">
						<a href="<?php echo 'EventDetail?id='.$event->getId() ?>" class="btn btn-all">+info</a>
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