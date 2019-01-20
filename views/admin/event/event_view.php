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
                                                        <th scope="col" style="width:300px"><i class="far fa-image"></i></th>
                                                        <th scope="col" style="width:90px">Nombre</th>
                                                        <th scope="col" style="width:500px">Descripción</th>
                                                        <th scope="col" style="width:90px">Categoría</th>
                                                        <th scope="col" style="width:200px"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(isset($events)){
                                                        foreach ($events as $event) { ?>
                                                            <tr>
                                                            <td scope="row" style="width:300px"><img style="width:300px; height:150px" src="<?php echo IMAGES.$event->getImg()?>" alt=""></td>
                                                            <td style="width:90px"><?php echo $event->getName()?></td>
                                                            <td style="width:200px"><?php echo $event->getDescription()?></td>
                                                            <td style="width:90px"><?php echo $event->getEventCategory()->getName()?></td>
                                                            <td style="width:200px">
                                                                <div class="btn-group">
                                                                    <a href="<?php echo "/".DIRECTORY."/"."AdminEvent/editView?id=".$event->getId()?>"  class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>                            
                                                                    <button value="<?php echo $event->getId()?>" onclick="deleteEvent(event)" class="btn btn-danger btn-sm fas fa-trash-alt"></button>                
                                                                </div>
                                                                <a href="<?php echo "/".DIRECTORY."/"."AdminSchedule?id=".$event->getId()?>"  style="background-color:#49B8CF; border-color:#49B8CF; width: 125px; font-size: 11px" class="btn btn-primary btn-sm"><i class="fas fa-list-ul"></i> Ver programaciones</a>
                                                                    <a href="<?php echo "/".DIRECTORY."/"."AdminSchedule/addView?id=".$event->getId()?>"  style="background-color:#1F872B; border-color:#1F872B; width: 125px; font-size: 11px" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Nueva programacion</a>        
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
