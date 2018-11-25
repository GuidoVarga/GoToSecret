<body>
    <div id="wrapper">
        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
				<div class="row white-bg p-4">
					<div class="col-12">
						<h2 class="border-bottom pb-4">Artistas</h2>
						<div class=" mt-5">
                            <div class="col-lg-12">
                                <div class="wrapper">
                                        <div class="col-lg-12">
                                            <form action="add" method="POST">
                                                <div class="border border-grey p-4">
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</button>
                                                        <a href="<?php echo "/".DIRECTORY."/"."AdminArtist"?>" class="btn btn-danger mt-2 mt-sm-0"><i class="fa fa-arrow-circle-left"></i> Volver</a>
                                                    </div>
                                                <div class="row">
                                                    <div class="col-12 mt-5 mb-3">
                                                    <h2 style="color:#da4f49">Crear Artista</h2>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Nombre Artista</label>
                                                            <input class="form-control" name="name-artist" type="text" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Imagen</label>
                                                            <input class="form-control" name="img-artist" type="file" required="">
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label">Descripción</label>
                                                        <textarea class="form-control" name="description-artist" rows="3" required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </form>    
                                        </div>        
                                </div>
                            </div>    
                        </div>
                    </div>    
                </div>	
            </div>		
        </div>
    </div>
</body>  