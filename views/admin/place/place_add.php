<?php namespace views\admin\place; ?>
<body class="place_add">
    <div id="wrapper">


        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
				<div class="row white-bg p-4">
					<div class="col-12">
						<h2 class="border-bottom pb-4">Lugares</h2>
						<div class=" mt-5">
                            <div class="col-lg-12">
                                <div class="wrapper">
                                        <div class="col-lg-12">
                                            <form action="add" method="POST">
                                                <div class="border border-grey p-4">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</button>
                                                        <a href="<?php echo "/".DIRECTORY."/"."AdminPlace"?>" class="btn btn-danger mt-2 mt-sm-0"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                                                    </div>
                                                <div class="row">
                                                    <div class="col-12 mt-5 mb-3">
                                                    <h2 style="color:#da4f49">Crear Lugar</h2>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Nombre Lugar</label>
                                                            <input class="form-control" name="name" type="text" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Direccion</label>
                                                            <input class="form-control" name="address" type="text" required="">
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="control-label">Ciudad</label>
                                                            <select class="form-control" id="city" name="city" >
                                                                <option value="">Selecciona una ciudad</option>
                                                                <?php if(isset($cities)){
                                                                     foreach ($cities as $city) { ?>
                                                                
                                                                <option value="<?php echo $city->getId()?>"><?php echo $city->getName()?></option>
                                                            <?php }
                                                                }
                                                                ?>
                                                            </select>
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