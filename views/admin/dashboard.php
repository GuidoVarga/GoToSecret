<?php namespace views\admin; ?>
<body class="dashboard">
    <div id="wrapper">
        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
                           
				<div class="row border-bottom white-bg p-4">
					<div class="col-12">
						<h2 class="border-bottom pb-4">Dashboard</h2>
						<div class="row mt-5">
                            <div class="col-lg-12">
                                <div class="wrapper">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <a class="hrefAdmin" href="<?php echo "/".DIRECTORY."/"."AdminArtist"?>">
                                                    <div class="card bg-info">
                                                        <div class="card-body">
                                                            <div class="d-flex no-block">
                                                                <div class=" align-self-center">
                                                                <i class="text-white fas fa-user-tie fa-2x"></i>
                                                                </div>
                                                                <div class="align-self-center">
                                                                    <h6 class="text-white m-t-10 m-b-0">Total de Artistas</h6>
                                                                    <h2 class="ml-4 text-white"><?php echo count($artists) ?></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>    
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <a class="hrefAdmin" href="<?php echo "/".DIRECTORY."/"."AdminEvent"?>">
                                                    <div class="card bg-success">
                                                        <div class="card-body">
                                                            <div class="d-flex no-block">
                                                                <div class=" align-self-center">
                                                                <i class="text-white fas fa-calendar-alt fa-2x"></i>
                                                                </div>
                                                                <div class="align-self-center">
                                                                    <h6 class="text-white m-t-10 m-b-0">Total de Eventos</h6>
                                                                    <h2 class="ml-4 text-white"><?php echo count($events) ?></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>    
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <a class="hrefAdmin" href="<?php echo "/".DIRECTORY."/"."AdminPlace"?>">
                                                    <div class="card bg-primary">
                                                        <div class="card-body">
                                                            <div class="d-flex no-block">
                                                                <div class=" align-self-center">
                                                                <i class="text-white fas fa-city fa-2x"></i>
                                                                </div>
                                                                <div class="align-self-center">
                                                                    <h6 class="text-white m-t-10 m-b-0">Total de Lugares</h6>
                                                                    <h2 class="ml-4 text-white"><?php echo count($places) ?></h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>    
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <a class="hrefAdmin" href="<?php echo "/".DIRECTORY."/"."AdminCategory"?>">
                                                    <div class="card bg-danger">
                                                    
                                                        <div class="card-body">
                                                                <div class="d-flex no-block">
                                                                    <div class=" align-self-center">
                                                                    <i class="text-white fas fa-tags fa-2x"></i>
                                                                    </div>
                                                                    <div class="align-self-center">
                                                                        <h6 class="text-white m-t-10 m-b-0">Total de Categorías</h6>
                                                                        <h2 class="ml-4 text-white"><?php echo count($eventCategories) ?></h2>
                                                                    </div>
                                                                </div>
                                                        </div>   
                                                    </div>
                                                </a>    
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