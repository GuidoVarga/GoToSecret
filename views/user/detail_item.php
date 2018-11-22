<body class="detail_item">
   <div class="container">
        <div class="row">
        <div class="col-12 mx-auto">
            <img class="w-100" src="<?php echo IMAGES.$event->getImg()?>" >
        </div>
        </div>
        <div class="row">
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


