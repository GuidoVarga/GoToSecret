
<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu text-sm-center text-lg-left" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="">
                Editar Perfil
            </a>
            <a class="dropdown-item" href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                Cerrar Sesion
                <form id="logout-form" action="" method="POST" style="display: none;">
                </form>
            </a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="Cart"><i class="fas fa-shopping-cart "></i></a>
    </li>
</ul>