<?php namespace views; ?>
<header class="header mb-4">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
            <a class="navbar-left" href=""><img class="img-responsive" src="<?php echo IMAGES?>logo-white.png" id="logo-nav" alt="GoToEvent"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNavDropdown" class="navbar-collapse collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="">Artistas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="" >Administracion</a></li>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-in-alt"></i>
                            Iniciar Sesión
                        </a>
                        <div class="dropdown-menu dropdown-login" aria-labelledby="navbarDropdownMenuLink">
                            <div class="row pt-3 pr-3 pl-3">
                                <div class="col-md-12">
                                    <button class="btn btn-fb btn-block mb-3" ><i class="fab fa-facebook"></i> Iniciar con Facebook </button>
                                    <form class="form" role="form" method="post" action="{{route('login')}}" accept-charset="UTF-8">
                                        <div class="form-group">
                                            <label class="sr-only" for="email">Email:</label>
                                            <input id="email" type="email" name="email" class="" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="password">Contraseña:</label>
                                            <input type="password" name="password" class="" id="password" placeholder="Contraseña" required>
                                            <div class="checkbox">
                                                <label class="form-check-label mt-2">
                                                    <input type="checkbox" name="remember"
                                                </label>
                                            </div>
                                            <div class="help-block text-right"><a href="">¿Olvidaste tu contraseña?</a></div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" id="btn_submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}" ><i class="far fa-plus-square"></i> Registrarse</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu text-sm-center text-lg-left" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="">
                                Editar Perfil
                            </a>
                            <a class="dropdown-item" href="">
                                Mis Pedidos
                            </a>
                            @endif
                            <a class="dropdown-item" href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Cerrar Sesion
                                <form id="logout-form" action="" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/pedidos')}}"><i class="fas fa-shopping-cart "></i>
                            <div class="items-carrito">
                                <span class="badge badge-primary">0</span>
                            </div></a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>

</header>