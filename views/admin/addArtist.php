<body class="login">
    <div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-sm-8 col-md-10 col-lg-6">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2 text-left">Crear Artista</h4>
                </header>
                <article class="card-body">
                    <form action="" method="post" class="form" role="form">
                        <div class="form-row">
                            <div class="col-12 col-md col-lg form-group">
                                <label>Artista</label>
                                <input class="form-control" name="artist" value="" placeholder="Inserta nombre" type="text" required>
                             </div> <!-- form-group end.// -->
                        </div>
                       <div class="form-row">
                            <div class="col-12 col-md col-lg form-group">
                                <label>Descripción</label>
                                <input class="form-control" name="description" value="" placeholder="Inserta descripción" type="text" required>
                             </div> <!-- form-group end.// -->
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md col-lg form-group">
                                <label>Imagen</label>
                                <input class="form-control" name="image" value="" type="file" required>
                             </div> <!-- form-group end.// -->
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-block"> Crear Artista </button>
                        </div> <!-- form-group// -->
                    </form>
                </article> <!-- card-body end .// -->
            </div> <!-- card.// -->
        </div> <!-- col.//-->

    </div>
</div>
</body>