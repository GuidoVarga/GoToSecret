<?php namespace views\user; ?>
<body class="login">
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-sm-8 col-md-10 col-lg-6">
                <div class="card">
                    <header class="card-header">
                        
                        <h4 class="card-title mt-2 text-left">Iniciar Sesión (Admin)</h4>
                    </header>
                    <article class="card-body">
                        <form action="Login/validateLogin" method="post" class="form" role="form">
                            <div class="form-row">
                                <div class="col-12 col-md col-lg form-group">
                                    <label>Email</label>
                                    <input id="email" class="form-control" name="email" value="" placeholder="Inserta tu Email" type="email">
                                </div>
                            </div> <!-- form-group end.// -->   
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Contraseña</label>
                                    <input class="form-control" id="password" name="password" value="" placeholder="Contraseña" type="password">
                                </div> <!-- form-group end.// -->
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-all btn-block"> Iniciar Sesión </button>
                            </div> <!-- form-group// -->
                        </form>
                    </article> <!-- card-body end .// -->
                    
                </div> <!-- card.// -->
            </div> <!-- col.//-->

        </div>
    </div>
</body>