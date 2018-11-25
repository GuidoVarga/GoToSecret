<body>
    <div id="wrapper">
        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
				<div class="row white-bg p-4">
					<div class="col-12">
						<h2 class="border-bottom pb-4">Evento: <?php echo $event->getName() ?></h2>
						<div class=" mt-5">
                            <div class="col-lg-12">
                                <div class="wrapper">
                                        <div class="col-lg-12">
                                            <form action="update" method="POST" enctype="multipart/form-data">
                                                <input name="id" id="id" value="<?php echo $event->getId()?>" hidden>
                                                <div class="border border-grey p-4">
                                                    <div class="text-right">
                                                        <button type="submit" onclick="updateEvent(event)" class="btn btn-primary"><i class="fas fa-hdd"></i> Guardar</button>
                                                        <a href="<?php echo "/".DIRECTORY."/"."AdminEvent"?>" class="btn btn-danger mt-2 mt-sm-0"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                                                    </div>
                                                <div class="row">
                                                    <div class="col-12 mt-5 mb-3">
                                                    <h2 style="color:#da4f49">Editar Evento</h2>
                                                    </div>
                                                   <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Nombre Evento</label>
                                                            <input class="form-control" id="name"  value="<?php echo $event->getName()?>" name="name" type="text" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Imagen</label>
                                                            <input class="form-control" id="img" name="img" type="file">
                                                            <input type="checkbox" id="oldImg-check" name="oldImg-check" value=""><label>Mantener imagen anterior</label>
                                                            <input value="<?php echo $event->getImg()?>" id="oldImg" hidden>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Nombre Evento</label>
                                                            <select class="form-control" id="category" name="category" >
                                                                <option value="">Selecciona una categoría</option>
                                                                <?php 
                                                                    if(isset($categories)){
                                                                        foreach ($categories as $category) { 
                                                                            if($category->getId()==$event->getEventCategory()->getId()){  ?>

                                                                                <option value="<?php echo $category->getId()?>" selected><?php echo $category->getName()?></option>
                                                                  <?php  }
                                                                    else
                                                                    {?>

                                                                                 <option value="<?php echo $category->getId()?>"><?php echo $category->getName()?></option>
                                                                     <?php }
                                                           }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label">Descripción</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3" required=""><?php echo $event->getDescription()?></textarea>
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