<ul class="navbar-nav">
    <li class="nav-item ">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-login" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-in-alt"></i>
            Iniciar Sesión
        </a>
        <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100 font-weight-bold">Iniciar Sesión</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" role="form" method="post" action="" accept-charset="UTF-8">
                            <div class="form-group group-modal">
                                <span class="fas fa-user form-control-modal"></span>
                                <input id="email-login" type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group group-modal">
                                <span class="fas fa-unlock-alt form-control-modal"></span>
                                <input type="password" name="password" class="form-control" id="password-login" placeholder="Contraseña" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" id="btn_login" class="btn btn-all btn-block"> Iniciar Sesión </button>
                            </div> 
                        </form>
                        <div class="text-center"><button onclick="" class="btn btn-fb mb-3"><i class="fab fa-facebook"></i> Iniciar con Facebook</button></div>
                        
                    </div>
                    <div class="modal-footer mx-5 pt-3 mb-1">
                        <p class="font-small grey-text d-flex justify-content-end">No tenés cuenta? <a href="#" data-toggle="modal" data-target="#modal-register"  data-dismiss="modal" class="blue-text ml-1"> Registrate</a></p>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#modal-register" aria-haspopup="true" aria-expanded="false"><i class="far fa-plus-square"></i> Registrarse</a>
        <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title w-100 font-weight-bold">Iniciar Sesión</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form" role="form" method="post" action="" accept-charset="UTF-8">
                            <div class="form-row">
                                <div class="col-12 col-md col-lg form-group group-modal">
                                    <span class="fas fa-user form-control-modal"></span>
                                    <input id="name" class="form-control" name="name" placeholder="Nombre" value="" type="text" required="" autofocus="">
                                </div>
                                <div class="col-12 col-md col-lg form-group group-modal">
                                    <span class="fas fa-user form-control-modal"></span>
                                    <input id="apellido" class="form-control" name="apellido" placeholder="Apellido" value="" type="text" required="">
                                </div> <!-- form-group end.// -->
                            </div>
                            <div class="form-group group-modal">
                                <span class="fas fa-envelope form-control-modal"></span>
                                <input id="email" class="form-control" name="email" value="" placeholder="Inserta tu Email" type="email">
                                <small class="form-text text-muted">No compartimos tu email con nadie.</small>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md col-lg form-group group-modal">
                                    <span class="fas fa-unlock-alt form-control-modal"></span>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                                </div>
                                <div class="col-12 col-md col-lg form-group group-modal">
                                    <span class="fas fa-unlock-alt form-control-modal"></span>
                                    <input type="password" name="password-repeat" class="form-control" id="password-repeat" placeholder="Repetir Contraseña" required>       
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-all btn-block"> Registrarse </button>
                                <small class="text-muted">Al clickear el boton 'Registrarse' confirmas que aceptas nuestros <br> Términos y Condiciones</small>
                            </div> 
                        </form>
                        <div class="text-center"><button onclick="" class="btn btn-fb mb-3"><i class="fab fa-facebook"></i> Iniciar con Facebook</button></div>
                        
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>