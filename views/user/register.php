<?php namespace views\user; ?>
<body class="register">
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-sm-8 col-md-10 col-lg-6">
                <div class="card">
                    <header class="card-header ">
                        <a href="" class="float-right btn btn-outline-secondary mt-1">Iniciar Sesión</a>
                        <h4 class="card-title mt-2 text-left">Bienvenido</h4>
                    </header>
                    <article class="card-body">
                        <form action="" method="post" class="form" role="form">
                            <div class="form-row">
                                <div class="col-12 col-md col-lg form-group">
                                    <label>Nombre</label>
                                    <input id="name" class="form-control" name="name" placeholder="Inserta tu Nombre" value="" type="text" required="" autofocus="">
                                </div> <!-- form-group end.// -->
                                <div class="col-12 col-md col-lg form-group">
                                    <label>Apellido</label>
                                    <input id="apellido" class="form-control" name="lastname" placeholder="Inserta tu Apellido" value="" type="text" required="">
                                </div> <!-- form-group end.// -->
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md col-lg form-group">
                                    <label>Email</label>
                                    <input id="email" class="form-control" name="email" value="" placeholder="Inserta tu Email" type="email">
                                    <small class="form-text text-muted">No compartimos tu email con nadie.</small>
                                </div> <!-- form-group end.// -->
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md col-lg form-group">
                                    <label>Contraseña</label>
                                    <input class="form-control" id="password" name="password" value="" placeholder="Contraseña" type="password">
                                </div> <!-- form-group end.// -->
                                <div class="col-12 col-md col-lg form-group">
                                    <label>Repetir Contraseña</label>
                                    <input class="form-control" id="password-confirm" name="password_confirmation" placeholder="Repetir contraseña" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" onclick="registerAjax(event)" class="btn btn-block btn-all"> Registrarse </button>
                            </div> <!-- form-group// -->
                            
                        </form>
                    </article> <!-- card-body end .// -->
                    <div class="border-top card-body text-center pb-0">
                        <button onclick="botonNuevo();" class="btn btn-fb mb-3"><i class="fab fa-facebook"></i> Iniciar con Facebook</button>
                    </div>
                </div> <!-- card.// -->
            </div> <!-- col.//-->

        </div>
    </div>
</body>

