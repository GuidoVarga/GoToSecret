<?php namespace views\admin\category; ?>
<body class="category_view">
    <div id="wrapper">


        <?php include(ROOT . 'views/admin/header.php') ?>
        <div class="d-md-flex">
            <?php include(ROOT . 'views/admin/sidebar.php') ?>
            <div id="page-wrapper" class="p-4">
                           
				<div class="row border-bottom white-bg p-4">
					<div class="col-12 ">
						<h2 class="border-bottom pb-4">Categorías</h2>
						<div class="row mt-5">
						    <div class="col-lg-12">
                                <div class="wrapper">
                                    <div class="col-lg-12">
                                        <div class="border border-grey p-4">
                                            <div class="text-right">
                                                <a href="<?php echo "/".DIRECTORY."/"."AdminCategory/addView"?>" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva Categoría</a>
                                            </div>
                                            <div class="table-responsive mt-4">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(isset($categories)){
                                                        foreach ($categories as $category) { ?>
                                                            <tr>
                                                            <td id="<?php echo 'category-name-'.$category->getId()?>"><?php echo $category->getName(); ?></td>
                                                            <td>
                                                                <div class="btn-group">
                                                                <!-- <a class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>                            
                                                                <a href="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>              -->
                                                                <button value="<?php echo $category->getId()?>" onclick="deleteCategory(event)" id="<?php echo 'button-delete-'.$category->getId()?>" class="btn btn-danger btn-sm fas fa-trash-alt"></button>
                                                                <button value="<?php echo $category->getId()?>" onclick="editCategory(event)" id="<?php echo 'button-edit-'.$category->getId()?>" class="btn btn-primary btn-sm fa fa-edit"></button>                                         
                                                                </div>
                                                            </td>
                                                            </tr>
                                                        <?php }
                                                        }
                                                        ?>
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
	</div>
</body>   
