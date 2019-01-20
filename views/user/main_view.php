<body class="main_view">
	<div class="container">
		<div class="title mt-5">
		 <h4>EVENTOS RECIENTES</h4>
		</div>
		<div id="carouselExampleControls" class="carousel slide mt-5 mx-auto" data-ride="carousel">
			<div class="carousel-inner">
			<?php $i=0; foreach($events as $event){?>
			<?php if($i==0){ ?>
    			<div class="carousel-item active">
     		 		<img class="d-block w-100" src="<?php echo IMAGES.$event->getImg()?>" alt="First slide">
    			</div>
			<?php }else{ ?>	
				<div class="carousel-item">
					<img class="d-block w-100" src="<?php echo IMAGES.$event->getImg()?>" alt="Second slide">
				</div>
					<?php }  $i++; }?>
  			</div>
		  	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			</a>
		  	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		    	<span class="sr-only">Next</span>
		  	</a>
		</div>

		<div class="title mt-5">
		 <h4>OTROS EVENTOS</h4>
		</div>

		<div class="row">

			<?php

			foreach ($events as $event) { ?>
			
			<div class="col-12 col-md-6 col-lg-6">
				<div class="card mt-5 mx-auto ">
		  			<img class="card-img-top" src="<?php echo IMAGES.$event->getImg()?>" alt="Card image cap">
		 			 <div class="card-body">
		    			<h5 class="card-title"><?php echo $event->getName()?></h5>
		    			<p class="card-text"><?php echo $event->getDescription()?></p>
		    			
		  			</div>
		  			<div class="card-footer">
    					<a href="<?php echo 'EventDetail?id='.$event->getId() ?>" class="btn btn-all">+info</a>
  					</div>
				</div>
			</div>
			<?php }?>
		</div>
		
	</div>
</body>