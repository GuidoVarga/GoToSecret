<body class="detail_item">
    <section class="content_breadcrumb d-flex justify-content-center align-items-center">
		<div class="contener-center-center">
			<div class="container">
				<h2>Detalle de Evento</h2>
			</div>
		</div>
	</section>
   <div class="container">
        <div class="row mt-5">
            <div class="col-12 mx-auto">
                <img class="w-100" style="border-style: solid;" src="<?php echo IMAGES.$event->getImg()?>" >
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-white">
                    <article class="card-body">
                        <h3 class="card-title mb-3 mx"><?php echo $event->getName()?> - Próximos Shows</h3>
                        <hr>
                        <div class=" card-text row">
                            
                            <?php if(isset($schedules)){

                            foreach ($schedules as $schedule) {
                            ?>
                        
                                    <div class="col-12 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title" style="font-weight: bold; color:#443d3d;"><?php echo $schedule->getPlace()->getName()?></h3>
                                                <hr>
                                                <div class="card-text" style="line-height: 20px;">
                                                        <dl class="place-detail">
                                                        <dt>Direccion</dt>
                                                        <dd>
                                                        <p><?php echo $schedule->getPlace()->getAddress()?></p>
                                                        </dd>
                                                        <dt>Ciudad</dt>
                                                        <dd>
                                                        <p><?php echo $schedule->getPlace()->getCity()->getName()?></p>
                                                        </dd>
                                                        </dl>
                                                        <dl class="date-detail">
                                                        <dt>Fecha</dt>
                                                        <dd>
                                                        <p><?php echo $schedule->getDay()?></p>
                                                        </dd>
                                                        </dl>
                                                </div>
                                            <a href="<?php echo 'EventSpecific?id='.$event->getId() ?>" class="btn btn-all">+ INFO</a>
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


