<body class="detail_item">
    <section class="content_breadcrumb d-flex justify-content-center align-items-center">
		<div class="contener-center-center">
			<div class="container">
				<h2>Detalle de Artista</h2>
			</div>
		</div>
	</section>
   <div class="container">
        <div class="row mt-5">
            <div class="col-12 p-2">
                <img class="w-75 w-lg-50 mx-auto d-block" style="border-style: solid;" src="<?php echo IMAGES.$artist->getImg()?>" alt="Card image cap">
            </div>
        </div>
        <div class="row mt-5">
        <div class="col-12">
            <div class="bg-white">
                <article class="card-body">
                    <h3 class="card-title mb-3 mx"><?php echo $artist->getName() ?> - Próximos Shows</h3>
                    <hr>
                    <div class=" card-text row">
                        <?php
                         if(isset($events)){

                        foreach ($events as $event) {
                        ?>
                      
                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title" style="font-weight: bold; color:#443d3d;"><?php echo $event->getName()?></h3>
                                            <hr>
                                            <div class="card-text" style="line-height: 20px;">
                                                    <dl class="category-detail">
                                                    <dt>Categoría</dt>
                                                    <dd>
                                                    <p><?php echo $event->getEventCategory()->getName()?></p>
                                                    </dd>
                                                    </dl>
                                             </div>
                                        <a href="#" class="btn btn-all">+ INFO</a>
                                      </div>
                                    </div>
                                </div>
                                <?php
                          }
                        }
                        ?>
                    </div>
                </article>
            </div>
        </div>
        </div>
    </div> 
</body>


