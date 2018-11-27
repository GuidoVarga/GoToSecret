<body>
  <div id="wrapper">
    <?php include(ROOT . 'views/admin/header.php') ?>
<div class="d-md-flex">
    <?php include(ROOT . 'views/admin/sidebar.php') ?>
  <div id="page-wrapper" class="p-4">
      <div class="row white-bg p-4">
       <div class="col-12">
        <h2 class="border-bottom pb-4"><?php echo $event->getName()?></h2>
        <div class=" mt-5">
          <div class="col-lg-12">
            <div class="wrapper">
              <div class="col-lg-12">
                <form action="" method="POST">
                  <div class="border border-grey p-4">
                    <div class="text-right">
                      <button type="submit" onclick="saveSchedule(event)" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</button>
                      <a href="javascript:history.go(-1)" class="btn btn-danger mt-2 mt-sm-0"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                    </div>
                    <div class="row">
                      <div class="col-12 mt-5 mb-3">
                        <h2 style="color:#da4f49">Crear Fecha</h2>
                      </div>
                      <div class="col-md-12">
                        <div class="form-row">
                          <div class="form-group col-12 col-md-6">
                            <label class="control-label">Fecha</label>
                            <input class="form-control" id="date" name="date" type="date" required="">
                          </div>
                          <div class="form-group col-12 col-md-6">
                            <label class="control-label">Lugares</label>
                            <select class="form-control" id="place" name="place" >
                              <option value="">Selecciona un lugar</option>
                              <?php if(isset($places)){
                                  foreach ($places as $place) {?>

                                <option value="<?php echo $place->getId()?>"><?php echo $place->getName().' - '.$place->getCity()->getName()?></option>

                                <?php
                                  }
                                }
                                ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-12 mt-5 mb-3">
                          <h3 style="color:#000">Plazas</h3>
                          <div id="table-locations-container" style="align-items: center" class="table-container col-10 mt-4" >
                            <table class="table table-bordered table-hover">
                              <thead>
                                <tr style="text-align:center">
                                <th>
                                    Tipo
                                </th>
                                <th>
                                    Cantidad
                                </th>
                                <th>
                                    Precio
                                </th>
                              </tr>
                              </thead>
                               <tbody id="table-body-locations">
                              
                              </tbody>
                            </table>

                          </div>
                          <div class="form-row mt-5">
                            <div class="form-group col-12 col-md-6">
                              <label class="control-label">Plazas</label>
                              <select class="form-control" id="location" name="location" >
                                <option value="">Selecciona una plaza</option>

                                <?php if(isset($locations)){
                                  foreach ($locations as $location) {?>

                                <option value="<?php echo $location->toJson() ?>"><?php echo $location->getName()?></option>

                                <?php
                                  }
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group col-12 col-md-3">
                              <label class="control-label">Cantidad</label>
                              <input class="form-control" id="quantity" name="quantity" type="number" min="0" required="">
                            </div>
                            <div class="form-group col-12 col-md-3">
                              <label class="control-label">Precio</label>
                              <input class="form-control" name="price" id="price" type="number" min="0" required="">
                            </div>

                          </div>
                          <button id="add-location" class="btn btn-primary" onclick="addLocation(event)" style="font-weight: bold"><i class="fas fa-plus"></i> Agregar Plaza</button>
                        </div>
                        <div class="col-12 mt-5 mb-3">
                          <h3 style="color:#000">Sub Evento</h3>

                           <div id="table-subEvents-container" style="align-items: center" class="table-container col-10 mt-4" >
                            <table class="table table-bordered table-hover" id="table-subEvents">
                              <thead>
                                <tr style="text-align:center">
                                <th>
                                    Artista
                                </th>
                                <th>
                                    Hora Inicio
                                </th>
                                <th>
                                    Hora Fin
                                </th>
                              </tr>
                              </thead>
                               <tbody id="table-body-subEvents">
                              
                              </tbody>
                            </table>

                          </div>

                          <div class="form-row mt-5">
                            <div class="form-group col-12 col-md-6">
                              <label class="control-label">Nombre Artista</label>
                              <select class="form-control" id="artist" name="artist" >
                                <option value="">Selecciona un Artista</option>
                                 <?php if(isset($artists)){
                                  foreach ($artists as $artist) {?>

                                <option value="<?php echo $artist->toJson() ?>"> <?php echo $artist->getName()?></option>

                                <?php
                                  }
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group col-12 col-md-3">
                              <label class="control-label">Hora Inicio</label>
                              <input class="form-control" id="initial-hour" name="initial-hour" type="text" required="">
                            </div>
                            <div class="form-group col-12 col-md-3">
                              <label class="control-label">Hora Fin</label>
                              <input class="form-control" id="finish-hour" name="finish-hour" type="text" required="">
                            </div>

                          </div>
                          <button id="add-subEvent" class="btn btn-primary" onclick="addSubEvent(event)" style="font-weight: bold"><i class="fas fa-plus"></i> Agregar Sub Evento</button>
                          <div class="form-row">

                          </div>                                                            
                        </div>     
                      </div>
                    </div> 
                  </form>    
                </div>        
              </div>
            </div>    
          </div>
        </div>    
      </div>	
    </div>	
</div>
</body>  