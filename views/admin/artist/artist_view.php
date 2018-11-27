<body>
  <div id="wrapper">
        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
        <div id="page-wrapper" class="p-4">

      <div class="row border-bottom white-bg p-4">
       <div class="col-12 ">
        <h2 class="border-bottom pb-4">Artistas</h2>
        <div class="row mt-5">
          <div class="col-lg-12">
            <div class="wrapper">
              <div class="col-lg-12">
                <div class="border border-grey p-4">
                  <div class="text-right">
                    <a href="<?php echo "/".DIRECTORY."/"."AdminArtist/addView"?>" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Artista</a>
                  </div>
                  <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col"><i class="far fa-image"></i></th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Descripción</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(isset($artists)){
                          foreach ($artists as $artist) {?>            
                        <tr>
                        <td scope="row" style="width:300px"><img style="width:300px; height:150px" src="<?php echo IMAGES.$artist->getImg()?>" alt=""></td>
                          <td><?php echo $artist->getName()?></td>
                          <td><?php echo $artist->getDescription()?></td>
                          <td>
                            <div class="btn-group">
                              <a href="<?php echo "/".DIRECTORY."/"."AdminArtist/editView?id=".$artist->getId()?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>                           
                              <button value="<?php echo $artist->getId()?>" onclick="deleteArtist(event)" class="btn btn-danger btn-sm fas fa-trash-alt"></button>                        
                            </div>
                          </td>
                        </tr>
                        <?php
                        }
                        }?>
                      </tbody>
                    </table>
                  </div>
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
