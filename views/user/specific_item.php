<body class="specific_item">
    <section class="content_breadcrumb d-flex justify-content-center align-items-center">
      <div class="contener-center-center">
         <div class="container">
            <h2>Detalle de Evento</h2>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <img class="w-100" src="<?php ROOT ?>resources/images/flyer2.jpg" style="border-style: solid;" >
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-10 mx-auto">
            <div class="card">
                <article class="card-body">
                    <h3 class="title mb-3 mx"><?php echo $event->getName()?> - <?php echo $schedule->getDay()?></h3>
                    <p class="price-detail-wrap"> 
                        <span class="price h3 text-warning"> 
                            <span class="currency">Precios desde $</span><span class="num">500</span>
                        </span> 
                    </p> <!-- price-detail-wrap .// -->
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <dl class="categoty-detail">
                                <dt>Categoría</dt>
                                <dd>
                                    <p><?php echo $event->getEventCategory()->getName()?></p>
                                </dd>
                            </dl>
                            <dl class="city-detail">
                                <dt>Ciudad</dt>
                                <dd>
                                    <p><?php echo $schedule->getPlace()->getCity()->getName()?></p>
                                </dd>
                            </dl>
                            <dl class="place-detail">
                                <dt>Lugar</dt>
                                <dd>
                                    <p><?php echo $schedule->getPlace()->getName()?></p>
                                </dd>
                            </dl>
                        </div>
                        <div class="col-12 col-md-8 location-detail">
                            <div class="row">

                                <?php foreach ($schedule->getLocations() as $location) {?>                        
                                    <div class="col-md-4">
                                        <div class="card" style="width: 10rem;">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $location->getName()?></h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Remanente: <?php echo $location->getSurplus()?></h6>
                                                <h6 class="card-subtitle mb-2 text-muted">Precio: $<?php echo $location->getPrice()?></h6>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>  
                    </div>

                    <hr>
                    <form action="Schedule/addToCart" method="POST">
                        <input name="schedule_id" id="schedule_id" value="<?php echo $schedule->getId()?>" hidden>
                        <input name="event_id" id="event_id" value="<?php echo $event->getId()?>" hidden>
                        <div class="row">

                            <div class="col-sm-4">
                                <dl class="param param-inline">
                                    <dt>Cantidad: </dt>
                                    <dd>
                                        <input type="number" name="quantity" class="form-control form-control-sm" style="width:70px;" min="1" max="10">
                                    </dd>
                                </dl>  <!-- item-property .// -->
                            </div> <!-- col.// -->
                            <div class="col-sm-8">
                                <dl class="param param-inline">
                                    <dt>Plazas: </dt>
                                    <dd>
                                        <fieldset id="group1">
                                            
                                             <?php foreach ($schedule->getLocations() as $location) {?>                        
                                             <label class="form-check form-check-inline">
                                                <input name="location" value="<?php echo $location->getId()?>" class="form-check-input" type="radio" name="group1">
                                                <span class="form-check-label"><?php echo $location->getName()?></span>
                                            </label>
                                         <?php }?>
                                        </fieldset>
                                    </dd>  
                                </dt>      
                            </dl>
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                    <hr>
                    <div class="text-right">
                        <button href="#" class=" btn btn-all btn-lg mx-auto text-uppercase"> <i class="fas fa-shopping-cart"></i> Agregar al carrito </button>   
                    </div>
                </form>
            </article>
        </div>
    </div>
</div>
</div> 

</body>


