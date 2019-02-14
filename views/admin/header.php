<?php namespace views\admin; ?>
<header class="align-items-start app-header flex-column flex-md-row navbar navbar-expand-md bg-dark">
            <div class="align-items-baseline d-flex flex-row navbar-brand p-lg-3 pl-3 pr-3 pt-3">
                 <a class="navbar-left" href="<?php echo "/".DIRECTORY."/"."Admin"?>"><img class="img-responsive logo" src="<?php echo "/".DIRECTORY."/"."resources/images/logo-white.png"?>" id="logo-nav" alt="GoToEvent"></a>
                <button class="collapsed ml-auto navbar-toggler navbar-dark" type="button" data-toggle="collapse"
                        data-target="#side-menu-wrapper" aria-controls="side-menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <ul class="nav navbar-nav ml-md-auto flex-row navbar-top-links">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo "/".DIRECTORY."/"."Home"?>"  aria-haspopup="true" aria-expanded="false"><i class="fas fa-eye"></i>
                                Previsualizar
                    </a>
                </li>
               
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-user">
                        <a class="dropdown-item" href="/GoToSecret/Admin/logout"><i class="fas fa-sign-out-alt  fa-fw"></i>Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
        </header>