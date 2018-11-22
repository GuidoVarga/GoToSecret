<?php namespace views;

?>
<header class="header mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-left" href="Home"><img class="img-responsive logo" src="<?php ROOT?>resources/images/logo-white.png" id="logo-nav" alt="GoToEvent"></a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                    
                </ul>
                <?php 
                    if(isset($user)){
                        include(VIEWS.'user/user_menu_nav.php');
                    }
                    else{
                        include(VIEWS.'user/login_nav.php');
                    }
                ?>
            </div>
        </div>
    </nav>

</header>