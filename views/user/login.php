<?php namespace views\user; ?>
<body class="login">
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-sm-8 col-md-10 col-lg-6">
                <div class="card">
                    <header class="card-header">
                        <a href="Home" class="float-right btn btn-outline-secondary mt-1">Home</a>
                        <h4 class="card-title mt-2 text-left">Iniciar Sesión</h4>
                    </header>
                    <article class="card-body">
                        <form class="form" role="form" method="post" action="" accept-charset="UTF-8">
                            <div class="form-group group-modal">
                                <span class="fas fa-user form-control-modal"></span>
                                <input id="email-login-card" type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group group-modal">
                                <span class="fas fa-unlock-alt form-control-modal"></span>
                                <input type="password" name="password" class="form-control" id="password-login-card" placeholder="Contraseña" required>
                                     <small class="form-text text-muted" align="left" id="password-error-login" style="display: none;"><p style="color:red;">Contraseña Incorrecta</p></small>
                            </div>
                             <div class="form-group">
                                <button id="btn_login" type="submit" onclick="loginAjaxCard(event)" class="btn btn-all btn-block"> Iniciar Sesión </button>
                            </div> 
                        </form>
                    </article> <!-- card-body end .// -->
                    <div class="border-top card-body text-center"><button class="btn btn-fb mb-3"><i class="fab fa-facebook"></i> Iniciar con Facebook</button></div>
                </div> <!-- card.// -->
            </div> <!-- col.//-->

        </div>
    </div>
</body>