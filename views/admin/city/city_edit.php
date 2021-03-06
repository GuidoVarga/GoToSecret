<?php namespace views\admin\city; ?>
<body class="city_edit">
    <div id="wrapper">


        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
				<div class="row white-bg p-4">
					<div class="col-12">
						<h2 class="border-bottom pb-4">Ciudad: <?php echo $city->getName()?></h2>
						<div class=" mt-5">
                            <div class="col-lg-12">
                                <div class="wrapper">
                                        <div class="col-lg-12">
                                            <form action="update" method="POST">
                                                    <div class="border border-grey p-4">
                                                        <div class="text-right">
                                                            <button type="submit" class="btn btn-primary"><i class="fas fa-hdd"></i> Guardar</button>
                                                            <a href="<?php echo "/".DIRECTORY."/"."AdminCity"?>" class="btn btn-danger mt-2 mt-sm-0"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                                                        </div>
                                                    <div class="row">
                                                        <div class="col-12 mt-5 mb-3">
                                                        <h2 style="color:#da4f49">Editar Ciudad</h2>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Nombre Ciudad</label>
                                                                <input value="<?php echo $city->getId()?>" name="id" hidden>
                                                                <input  value="<?php echo $city->getName()?>"class="form-control" name="name" type="text" required="">
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