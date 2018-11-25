<body>
    <div id="wrapper">
        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
                           
				<div class="row border-bottom white-bg p-4">
					<div class="col-12 ">
						<h2 class="border-bottom pb-4">Eventos</h2>
						<div class="row mt-5">
						    <div class="col-lg-12">
                                <div class="wrapper">
                                    <div class="col-lg-12">
                                        <div class="border border-grey p-4">
                                            <div class="text-right">
                                                <a href="<?php echo "/".DIRECTORY."/"."AdminEvent/addView"?>"  class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Evento</a>
                                            </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col"><i class="far fa-image"></i></th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Descripción</th>
                                                        <th scope="col">Categoría</th>
                                                        <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                        <th scope="row"></th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>Hola</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?php echo "/".DIRECTORY."/"."AdminEvent/editView"?>"  class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>                            
                                                                <a href="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>                        
                                                            </div>
                                                        </td>
                                                        </tr>
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
