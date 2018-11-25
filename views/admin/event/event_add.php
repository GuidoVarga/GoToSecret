<body>
    <div id="wrapper">


        <header class="align-items-start app-header flex-column flex-md-row navbar navbar-expand-md bg-dark">
            <div class="align-items-baseline d-flex flex-row navbar-brand p-lg-3 pl-3 pr-3 pt-3">
                 <a class="navbar-left" href=""><img class="img-responsive logo" src="<?php ROOT?>resources/images/logo-white.png" id="logo-nav" alt="GoToEvent"></a>
                <button class="collapsed ml-auto navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#side-menu-wrapper" aria-controls="side-menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <ul class="nav navbar-nav ml-md-auto flex-row navbar-top-links">
                <li class="nav-item">
                    <a class="nav-link" href="Home"  aria-haspopup="true" aria-expanded="false"><i class="fas fa-eye"></i>
                                Previsualizar
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-messages dropdown-menu-right">
                        <a class="dropdown-item" href="#">
                            <div>
                                <strong>John Smith</strong>
                                <span class="float-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div>
                                <strong>John Smith</strong>
                                <span class="float-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div>
                                <strong>John Smith</strong>
                                <span class="float-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                            </div>
                            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item see-more text-center" href="#">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-tasks">
                        <a class="dropdown-item" href="#">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="float-right text-muted">40% Complete</span>
                                </p>
                                <div class="progress active">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                         role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                         style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="float-right text-muted">20% Complete</span>
                                </p>
                                <div class="progress active">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                                         role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                         style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="float-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress active">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                         role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                         style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="float-right text-muted">80% Complete</span>
                                </p>
                                <div class="progress active">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                                         role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                         style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item see-more text-center" href="#">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-alerts">
                        <a class="dropdown-item" href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="float-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="float-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="float-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="float-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="float-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item see-more text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-user">
                        <a class="dropdown-item" href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </header>
        <div class="d-md-flex">
            <div class="sidebar" role="navigation">
                <div class="sidebar-nav collapse navbar-collapse show" id="side-menu-wrapper">
                    <ul class="nav navbar-nav navbar-collapse flex-column side-nav list-group" id="side-menu">
                        <li class="list-group-item">
                            <a href="index.html"><i class="fas fa-home"></i> Dashboard</a>
                        </li>                   
                        <li class="list-group-item">
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>ABM<span class="fa arrow"></span></a>
                            <ul class="nav-second-level list-group nested">
                                <li class="list-group-item">
                                    <a href="<?php echo "/".DIRECTORY."/"."AdminArtist"?>"><i class="fas fa-user-tie"></i> Artistas</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo "/".DIRECTORY."/"."AdminEvent"?>"><i class="fas fa-calendar-alt"></i> Eventos</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo "/".DIRECTORY."/"."AdminCity"?>"><i class="fas fa-city"></i> Ciudades</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="<?php echo "/".DIRECTORY."/"."AdminLocation"?>"><i class="fas fa-chair"></i> Plazas</a>
                                </li> 
                                <li class="list-group-item">
                                    <a href="<?php echo "/".DIRECTORY."/"."AdminCategory"?>"><i class="fas fa-tags"></i> Categorías</a>
                                </li> 
                                <li class="list-group-item">
                                    <a href="<?php echo "/".DIRECTORY."/"."AdminSchedule"?>"><i class="fas fa-calendar-alt"></i> Fechas</a>
                                </li>                             
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="list-group-item">
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span
                                    class="fa arrow"></span></a>
                            <ul class="nav-second-level list-group nested">
                                <li class="list-group-item">
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav-third-level list-group nested">
                                        <li class="list-group-item">
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="list-group-item">
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav-second-level list-group nested">
                                <li class="list-group-item">
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <div id="page-wrapper" class="p-4">
				<div class="row white-bg p-4">
					<div class="col-12">
						<h2 class="border-bottom pb-4">Eventos</h2>
						<div class=" mt-5">
                            <div class="col-lg-12">
                                <div class="wrapper">
                                        <div class="col-lg-12">
                                            <form action="add" method="POST" enctype="multipart/form-data">
                                                <div class="border border-grey p-4">
                                                    <div class="text-right">
                                                        <button type="submit" onclick="addEvent(event)" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</button>
                                                        <a href="<?php echo "/".DIRECTORY."/"."AdminEvent"?>" class="btn btn-danger mt-2 mt-sm-0"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                                                    </div>
                                                <div class="row">
                                                    <div class="col-12 mt-5 mb-3">
                                                    <h2 style="color:#da4f49">Crear Evento</h2>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Nombre Evento</label>
                                                            <input class="form-control" id="name" name="name" type="text" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Imagen</label>
                                                            <input class="form-control" id="img" name="img" type="file">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Categoría</label>
                                                            <select class="form-control" id="category" name="category" >
                                                                <option value="">Selecciona una categoría</option>
                                                                <?php if(isset($categories)){
                                                                     foreach ($categories as $category) { ?>
                                                                
                                                                <option value="<?php echo $category->getId()?>"><?php echo $category->getName()?></option>
                                                            <?php }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label">Descripción</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3" required=""></textarea>
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