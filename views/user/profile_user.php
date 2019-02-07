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
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Pedidos</a>
                </li>
              
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                        <form class="form" action="" role="form" method="post" >
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="name" type="text" value="<?php echo $user->getName(); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Apellido</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="last-name" type="text" value="<?php echo $user->getLastName();?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="email" type="email" value="<?php echo $user->getAccount()->getEmail();?>">
                                </div>
                            </div>
                            <div class="form-group row">
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
                            </div>
                        </form>
                </div>
                <div class="tab-pane" id="messages">
                    <!--div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                    </div-->
                    <table class="table table-hover table-striped">
                      <thead>
                        <th>
                            N° Pedido
                        </th> 
                        <th>
                            Fecha
                        </th>
                      </thead>
                        <tbody>   
                            <tr data-toggle="collapse" data-target="#accordion1" class="clickable">
                              <td>
                                10001
                              </td>
                              <td>
                              19/08/2019
                              </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                  <div id="accordion1" class="collapse">
                                      Evento: Ettap Kyle <br>
                                      Precio: $1000
                                  </div>
                                </td>
                            </tr>
                            <tr data-toggle="collapse" data-target="#accordion2" class="clickable">
                              <td>
                                10001
                              </td>
                              <td>
                              19/08/2019
                              </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                  <div id="accordion2" class="collapse">
                                      Evento: Ettap Kyle <br>
                                      Precio: $1000
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
</body>