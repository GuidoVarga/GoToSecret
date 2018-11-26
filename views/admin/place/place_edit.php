<body>
  <div id="wrapper">


    <?php include(ROOT . 'views/admin/header.php') ?>
    <div class="d-md-flex">
      <?php include(ROOT . 'views/admin/sidebar.php') ?>
      <div id="page-wrapper" class="p-4">
        <div class="row white-bg p-4">
         <div class="col-12">
          <h2 class="border-bottom pb-4">Ciudades</h2>
          <div class=" mt-5">
            <div class="col-lg-12">
              <div class="wrapper">
                <div class="col-lg-12">
                  <form action="update" method="POST">
                    <div class="border border-grey p-4">
                      <div class="text-right">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-hdd"></i> Guardar</button>
                        <a href="<?php echo "/".DIRECTORY."/"."AdminPlace"?>" class="btn btn-danger mt-2 mt-sm-0"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                      </div>
                      <div class="row">
                        <div class="col-12 mt-5 mb-3">
                          <h2 style="color:#da4f49">Editar Ciudad</h2>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input value="<?php echo $place->getId()?>" name="id" hidden>
                            <label class="control-label">Nombre Lugar</label>
                            <input class="form-control" value="<?php echo $place->getName()?>"name="name" type="text" required="">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Direccion</label>
                            <input class="form-control" value="<?php echo $place->getAddress()?>" name="address" type="text" required="">
                          </div>
                          <div class="form-group">
                            <label class="control-label">Ciudad</label>
                            <select class="form-control" id="city" name="city" >
                              <option value="">Selecciona una ciudad</option>
                              <?php if(isset($cities)){
                               foreach ($cities as $city) { 

                                if($city->getId()==$place->getCity()->getId()){?>

                                  <option value="<?php echo $city->getId()?>" selected><?php echo $city->getName()?></option>
                                <?php }
                                else{?>

                                  <option value="<?php echo $city->getId()?>"><?php echo $city->getName()?></option>
                                <?php   }
                              }
                            }
                            ?>
                          </select>
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
</div>
</body>  