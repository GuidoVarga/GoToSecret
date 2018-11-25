<body>
  <div id="wrapper">


    <header class="align-items-start app-header flex-column flex-md-row navbar navbar-expand-md bg-dark">
      <div class="align-items-baseline d-flex flex-row navbar-brand p-lg-3 pl-3 pr-3 pt-3">
       <a class="navbar-left" href=""><img class="img-responsive logo" src="<?php echo IMAGES?>logo-white.png" id="logo-nav" alt="GoToEvent"></a>
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
              <a href="<?php echo "/".DIRECTORY."/"."AdminPlace"?>"><i class="fas fa-city"></i> Ciudades</a>
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
        <h2 class="border-bottom pb-4"><?php echo $event->getName()?></h2>
        <div class=" mt-5">
          <div class="col-lg-12">
            <div class="wrapper">
              <div class="col-lg-12">
                <form action="" method="POST">
                  <div class="border border-grey p-4">
                    <div class="text-right">
                      <button type="submit" onclick="saveSchedule(event)" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</button>
                      <a href="<?php echo "/".DIRECTORY."/"."AdminSchedule"?>" class="btn btn-danger mt-2 mt-sm-0"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                    </div>
                    <div class="row">
                      <div class="col-12 mt-5 mb-3">
                        <h2 style="color:#da4f49">Crear Fecha</h2>
                      </div>
                      <div class="col-md-12">
                        <div class="form-row">
                          <div class="form-group col-12 col-md-6">
                            <label class="control-label">Fecha</label>
                            <input class="form-control" id="date" name="date" type="date" required="">
                          </div>
                          <div class="form-group col-12 col-md-6">
                            <label class="control-label">Lugares</label>
                            <select class="form-control" id="place" name="place" >
                              <option value="">Selecciona un lugar</option>
                              <?php if(isset($places)){
                                  foreach ($places as $place) {?>

                                <option value="<?php echo $place->getId()?>"><?php echo $place->getName().' - '.$place->getCity()->getName()?></option>

                                <?php
                                  }
                                }
                                ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-12 mt-5 mb-3">
                          <h3 style="color:#000">Plazas</h3>
                          <div id="table-locations-container" style="align-items: center" class="table-container col-10 mt-4" >
                            <table class="table table-bordered table-hover">
                              <thead>
                                <tr style="text-align:center">
                                <th>
                                    Tipo
                                </th>
                                <th>
                                    Cantidad
                                </th>
                                <th>
                                    Precio
                                </th>
                              </tr>
                              </thead>
                               <tbody id="table-body-locations">
                              
                              </tbody>
                            </table>

                          </div>
                          <div class="form-row mt-5">
                            <div class="form-group col-12 col-md-6">
                              <label class="control-label">Plazas</label>
                              <select class="form-control" id="location" name="location" >
                                <option value="">Selecciona una plaza</option>

                                <?php if(isset($locations)){
                                  foreach ($locations as $location) {?>

                                <option value="<?php echo $location->toJson() ?>"><?php echo $location->getName()?></option>

                                <?php
                                  }
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group col-12 col-md-3">
                              <label class="control-label">Cantidad</label>
                              <input class="form-control" id="quantity" name="quantity" type="number" min="0" required="">
                            </div>
                            <div class="form-group col-12 col-md-3">
                              <label class="control-label">Precio</label>
                              <input class="form-control" name="price" id="price" type="number" min="0" required="">
                            </div>

                          </div>
                          <button id="add-location" class="btn btn-primary" onclick="addLocation(event)" style="font-weight: bold"><i class="fas fa-plus"></i> Agregar Plaza</button>
                        </div>
                        <div class="col-12 mt-5 mb-3">
                          <h3 style="color:#000">Sub Evento</h3>

                           <div id="table-subEvents-container" style="align-items: center" class="table-container col-10 mt-4" >
                            <table class="table table-bordered table-hover" id="table-subEvents">
                              <thead>
                                <tr style="text-align:center">
                                <th>
                                    Artista
                                </th>
                                <th>
                                    Hora Inicio
                                </th>
                                <th>
                                    Hora Fin
                                </th>
                              </tr>
                              </thead>
                               <tbody id="table-body-subEvents">
                              
                              </tbody>
                            </table>

                          </div>

                          <div class="form-row mt-5">
                            <div class="form-group col-12 col-md-6">
                              <label class="control-label">Nombre Artista</label>
                              <select class="form-control" id="artist" name="artist" >
                                <option value="">Selecciona un Artista</option>
                                 <?php if(isset($artists)){
                                  foreach ($artists as $artist) {?>

                                <option value="<?php echo $artist->toJson() ?>"> <?php echo $artist->getName()?></option>

                                <?php
                                  }
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group col-12 col-md-3">
                              <label class="control-label">Hora Inicio</label>
                              <input class="form-control" id="initial-hour" name="initial-hour" type="text" required="">
                            </div>
                            <div class="form-group col-12 col-md-3">
                              <label class="control-label">Hora Fin</label>
                              <input class="form-control" id="finish-hour" name="finish-hour" type="text" required="">
                            </div>

                          </div>
                          <button id="add-subEvent" class="btn btn-primary" onclick="addSubEvent(event)" style="font-weight: bold"><i class="fas fa-plus"></i> Agregar Sub Evento</button>
                          <div class="form-row">

                          </div>                                                            
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