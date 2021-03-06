<?php namespace views\admin\location; ?>
<body class="location_view">
    <div id="wrapper">
        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
                           
				<div class="row border-bottom white-bg p-4">
					<div class="col-12">
						<h2 class="border-bottom pb-4">Plazas</h2>
						<div class="row mt-5">
                            <div class="col-lg-12">
                                <div class="wrapper">
                                    <div class="col-lg-12">
                                        <div class="border border-grey p-4">
                                            <div class="text-right">
                                                <a href="<?php echo "/".DIRECTORY."/"."AdminLocation/addView"?>" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva Plaza</a>
                                            </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(isset($locations)){

                            foreach ($locations as $location) { ?>
                              <tr>
                                <td id="<?php echo 'location-name-'.$location->getId()?>"><?php echo $location->getName(); ?></td>
                                <td>
                                  <div class="btn-group">
                                   <!-- <a class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>                            
                                    <a href="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>              -->
                                    <button value="<?php echo $location->getId()?>" onclick="deleteLocation(event)" id="<?php echo 'button-delete-'.$location->getId()?>" class="btn btn-danger btn-sm fas fa-trash-alt"></button>
                                    <button value="<?php echo $location->getId()?>" onclick="editLocation(event)" id="<?php echo 'button-edit-'.$location->getId()?>" class="btn btn-primary btn-sm fa fa-edit"></button>                                         
                                  </div>
                                </td>
                              </tr>
                            <?php }
                          }
                         ?>
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