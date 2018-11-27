<body>
    <div id="wrapper">
        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
                           
				<div class="row border-bottom white-bg p-4">
					<div class="col-12">
						<h2 class="border-bottom pb-4">Lugares</h2>
						<div class="row mt-5">
                            <div class="col-lg-12">
                                <div class="wrapper">
                                    <div class="col-lg-12">
                                        <div class="border border-grey p-4">
                                            <div class="text-right">
                                                <a href="<?php echo "/".DIRECTORY."/"."AdminPlace/addView"?>" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Lugar</a>
                                            </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Direccion</th>
                                                         <th scope="col">Ciudad</th>
                                                        <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(isset($places)){

                                                            foreach ($places as $place) {?>
                                                        <tr>
                                                        <td><?php echo $place->getName()?></td>
                                                        <td><?php echo $place->getAddress()?></td>
                                                        <td><?php echo $place->getCity()->getName()?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?php echo "/".DIRECTORY."/"."AdminPlace/editView?id=".$place->getId()?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>                            
                                                                <button onclick="deletePlace(event)" value="<?php echo $place->getId()?>" class="btn btn-danger btn-sm fas fa-trash-alt"></button>                        
                                                            </div>
                                                        </td>
                                                        </tr>

                                                        <?php 
                                                         }
                                                        }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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