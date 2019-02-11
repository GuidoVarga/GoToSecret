<?php namespace views\user;
/*<div class="container">
    <h1>Editar Perfil</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <!-- edit form column -->
      <div class="col-12 mx-auto personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div>
        <h3>Info. Personal</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">Nombre:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="name" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Apellido:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="last-name" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="password" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name="confirm-password" value="">
            </div>
          </div>
          <div class="form-group text-right">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-12">
              <input type="button" class="btn btn-all" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>*/  ?>

<body class="profile_user">
  <div class="container">
    <div class="row my-2">
        <div class="col-lg-12 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Mi Perfil</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#orders" data-toggle="tab" class="nav-link">Pedidos</a>
                </li>
              
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                        <form class="form" action="" role="form" method="post" >
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="name" disabled="true" type="text" value="<?php echo $user->getName(); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Apellido</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="last-name" disabled="true" type="text" value="<?php echo $user->getLastName();?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="email" type="email" disabled="true" value="<?php echo $user->getAccount()->getEmail();?>">
                                </div>
                            </div>
                            <!--div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Password</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="password" type="password" value="<?php echo $user->getAccount()->getPassword(); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="password-repeat" type="password" value="<?php echo $user->getAccount()->getPassword(); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-8 text-right">
                                    <input type="button" class="btn btn-all" value="Guardar Cambios">
                                    <input type="reset" class="btn btn-default" value="Cancelar">
                                </div>
                            </div-->
                        </form>
                </div>
                <div class="tab-pane" id="orders">
                    <!--div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                    </div-->
                    <div class="table d-table">
                      
                      <table class="table table-hover table">
                          <tbody>   
                              <?php foreach ($orders as $order) {?>                                
                              <tr data-toggle="collapse" data-target="<?php echo '#accordion'. $order->getId()?>" class="clickable collapse-row collapsed">
                                <td>
                                    <span class="float-right font-weight-bold"><?php echo 'Fecha: '.$order->getDate()?></span><span class="font-weight-bold"> <?php echo 'Orden: #'. $order->getId()?></span>
                                </td> 
                              </tr>
                              <tr>
                                <td colspan="3">
                                  <table class="table" id="<?php echo 'accordion'. $order->getId()?>" class="collapse">
                                    <thead class="thead-order">
                                      <th>
                                        Evento
                                      </th>
                                      <th>
                                        Fecha
                                      </th>
                                      <th>
                                      Lugar
                                        </th>
                                       <th>
                                       Plaza
                                      </th>
                                       <th>
                                        Cantidad
                                      </th>
                                       <th>
                                        Precio 
                                      </th>
                                       <th>
                                        Subtotal
                                      </th>

                                    </thead>
                                    <tbody>                        
                                     <?php 
                                        $orderLines = $order->getOrderLines();
                                        foreach ($orderLines as $orderLine) {

                                            ?>
                                        <tr>
                                            <td>
                                                <input value="<?php echo $orderLine->getEvent()->getName()?>" hidden/>
                                                <label for=""><?php echo $orderLine->getEvent()->getName()?></label>
                                            </td>  
                                            <td>
                                                <label for=""><?php echo $orderLine->getSchedule()->getDay()?></label>
                                            </td>
                                            <td>
                                                <label for=""><?php echo $orderLine->getSchedule()->getPlace()->getName().' - ' .$orderLine->getSchedule()->getPlace()->getCity()->getName();?></label>
                                            </td>
                                            <td>
                                                <label for=""><?php echo $orderLine->getLocation()->getName()?></label>
                                            </td>
                                            <td>
                                                <label for=""><?php echo $orderLine->getQuantity()?></label>
                                            </td>
                                                <td>
                                                <label for=""><?php echo $orderLine->getLocation()->getPrice()?></label>
                                            </td>
                                            <td>
                                                <label for=""><?php echo $orderLine->getPrice()?></label>
                                            </td>
                                            <td class="text-center" style="border:0;">   
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    
                                        ?>

                                    </tbody>
                                  </table>
                                   
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody> 
                      </table>
                      
                    
                    
                    </div> 
                </div> 
            </div>
        </div>    
    </div>
  </div>
</body>