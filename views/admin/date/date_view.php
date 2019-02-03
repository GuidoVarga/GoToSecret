<?php namespace views\admin\date; ?>
<body class="date_view">
    <div id="wrapper">


        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
        <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
                           
				<div class="row border-bottom white-bg p-4">
					<div class="col-12 ">
						<h2 class="border-bottom pb-4"><?php echo $event->getName()?> </h2>
						<div class="row mt-5">
						    <div class="col-lg-12">
                                <div class="wrapper">
                                    <div class="col-lg-12">
                                        <div class="border border-grey p-4">
                                            <div class="text-left">
                                                <h3>Fechas</h3>
                                            </div>
                                            <div class="text-right">
                                                <a href="<?php echo "/".DIRECTORY."/"."AdminSchedule/addView?id=".$eventId?>" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva Fecha</a>
                                                <a href="javascript:history.go(-1)" class="btn btn-danger mt-2 mt-sm-0"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                                            </div>

                                            <div class="table-responsive mt-4">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">Fecha</th>
                                                        <th scope="col">Lugar</th>
                                                     
                                                        <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(isset($schedules)){
                                                            foreach ($schedules as $schedule) {?>
                                                        
                                                               
                                                           
                                                        <tr>
                                                        <td><?php echo $schedule->getDay()?></td>
                                                        <td><?php echo $schedule->getPlace()->getName().' - '.$schedule->getPlace()->getCity()->getName()?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?php echo "/".DIRECTORY."/"."AdminSchedule/editView?id=".$schedule->getId()?>"  class="btn btn-primary btn-sm"><i class="fa fa-edit"> Ver mas</i></a>                            
                                                                <button onclick="deleteSchedule(event)"  value="<?php echo $schedule->getId()?>" class="btn btn-danger btn-sm fas fa-trash-alt"></button>                                 
                                                            </div>
                                                        </td>
                                                        </tr>
                                                        <?php }
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