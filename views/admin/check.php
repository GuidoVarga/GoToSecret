<body class="test">
    <div class="wrapper">
        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
				<div class="row white-bg p-4">
					<div class="col-12">
						<h2 class="border-bottom pb-4">Cantidad Vendida y Remanente</h2>
						<div class=" mt-5">
                            <div class="col-lg-12">
                                <div class="wrapper">
                                    <div class="col-lg-12">
                                        <div class="border border-grey p-4">
                                            <div class="row">
                                                <div class="form-group group-search mx-auto">
                                                        <span class="fas fa-search form-control-search"></span>
                                                        <input class="form-control" id="search" type="text" placeholder="Buscar Evento">
                            
                                                </div>  
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Descripción</th>
                                                        <th scope="col">Categoría</th>
                                                        <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="myTable">
                                                    <?php if(isset($events)){
                                                        foreach ($events as $event) {?>  
                                                        <tr>
                                                        <td><?php echo $event->getName()?></td>
                                                        <td><?php echo $event->getDescription()?></td>
                                                        <td><?php echo $event->getEventCategory()->getName()?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal"><i class="fa fa-search"></i></button>
                                                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="modal">Nombre de Evento</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <dl class="detail">
                                                                            <dt>Cantidad Vendida</dt>
                                                                            <dd>
                                                                            <p>150</p>
                                                                            </dd>
                                                                            <dt>Remanente</dt>
                                                                            <dd>
                                                                            <p>150</p>
                                                                            </dd>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>                      
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
                                        
                                    <div class="row">
                                       
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