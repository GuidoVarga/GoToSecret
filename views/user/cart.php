<?php namespace views\user; ?>
<body class="cart">
    <section class="content_breadcrumb d-flex justify-content-center align-items-center">
		<div class="contener-center-center">
			<div class="container">
				<h2>Carrito</h2>
			</div>
		</div>
	</section>
    <section class="section-cart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <form action="" method="POST" accept-charset="utf-8">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        <span class="d-none d-md-block">Evento</span>
                                        <span class="d-md-none">Even.</span>
                                    </th>
                                    <th>
                                        <span class="d-none d-md-block">Fecha</span>
                                        <span class="d-md-none">Fech.</span>
                                    </th>
                                    <th>
                                        <span class="d-none d-md-block">Lugar</span>
                                        <span class="d-md-none">Lug.</span>
                                    </th>
                                    <th>
                                        <span class="d-none d-md-block">Plaza</span>
                                        <span class="d-md-none">Pla.</span>
                                    </th>
                                    <th>
                                        <span class="d-none d-md-block">Cantidad</span>
                                        <span class="d-md-none">Cant.</span>
                                    </th>
                                    <th>
                                        <span class="d-none d-md-block">Precio</span>
                                        <span class="d-md-none">PRE.</span>
                                    </th>
                                    <th>
                                        <span class="d-none d-md-block">Subtotal</span>
                                        <span class="d-md-none">Sub.</span>
                                    </th>
                                    
                                </tr>
                                </thead>
                                <tbody id="cart-tbody">

                                    <?php if(isset($cart)){


                                        foreach ($cart as $orderLine) {
                                            ?>
                                        <tr>
                                            <td>
                                                <input value="<?php echo $orderLine->getId()?>" hidden/>
                                                <label for=""><?php echo $orderLine->getEvent()->getName()?></label>
                                            </td>  
                                            <td>
                                                <label for=""><?php echo $orderLine->getSchedule()->getDay()?></label>
                                            </td>
                                            <td>
                                                <label for=""><?php echo $orderLine->getSchedule()->getPlace()->getName().' - ' .$orderLine->getSchedule()->getPlace()->getCity()->getName();?></label>
                                            </td>
                                            <td>
                                                <label for=""><?php echo $orderLine->getLocation()->getName()?></label>
                                            </td>
                                            <td>
                                                <label for=""><?php echo $orderLine->getQuantity()?></label>
                                            </td>
                                                <td>
                                                <label for=""><?php echo $orderLine->getLocation()->getPrice()?></label>
                                            </td>
                                            <td>
                                                <label for=""><?php echo $orderLine->getPrice()?></label>
                                            </td>
                                            <td class="text-center" style="border:0;">
                                            <button class="btn btn-all btn-sm fas fa-times" onclick="deleteCartLine(event)" value="" ></button>     
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                        ?>
                                </tbody>
                                <tfooter>
                                     <tr style="background-color: #9c9494; color: white; font-size:20px;font-weight: 400;text-transform: uppercase;">
                                    <td colspan="5"></td>
                                    <td align="left">TOTAL</td>
                                    <td align="left">
                                        <span id="total">
                                            <?php if(isset($total)){
                                                echo $total;
                                            }?>
                                        </span>
                                    </td>
                                </tr>
                                </tfooter>
                            </table>
                        
                           
                        </form>
                    </div>
                </div>
            </div>
            <?php if(isset($cart)){?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <header class="card-header">
                                <h3 class="card-title mt-2 text-left">Completa Tus Datos</h3>
                            </header>
                            <article class="card-body">
                                <div class="form-group group-modal">
                                                <span class="fas fa-envelope form-control-modal"></span>
                                                <input type="number" onblur="checkButtonConfirm()" class="form-control" name="" value=""  id="number-card" placeholder="Numero de Tarjeta">
                                </div>
                                <div class="form-group group-modal">
                                            <span class="fas fa-envelope form-control-modal"></span>
                                            <input   type="number" onblur="checkButtonConfirm()" class="form-control" name="" value=""  id="code" placeholder="Codigo de Seguridad" >
                                </div>
                                <div class="form-group group-modal">
                                            <span class="fas fa-envelope form-control-modal"></span>
                                            <input onblur="checkButtonConfirm()" class="form-control" name="" value=""  id="name-card" placeholder="Nombre de Titular" >
                                </div>
                                <div class="form-group group-modal">
                                            <span class="fas fa-envelope form-control-modal"></span>
                                            <select  onblur="checkButtonConfirm()"class="form-control" id="pay-method" name="">
                                                <option value="">Seleccione un metodo de Pago</option>
                                                <option value="MercadoPago">MercadoPago</option>
                                            </select>
                                </div>
                            </article> <!-- card-body end .// -->
                            
                        </div> <!-- card.// -->
                        
                        <div class="form-button-cart col-12 col-sm-4 col-md-4 col-xl-2 position-absolute">
                            <button type="button" id="button-order-confirm" data-toggle="modal" data-target="#modalcart"class="btn btn-block btn-all"> CONFIRMAR </button>
                        </div>
                        <div id="modalcart" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">¿Estás seguro?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-6">
                                            <button onclick="confirmOrder(event)" type="button" class="btn btn-block btn-all"> SI </button>
                                        </div>
                                        <div class="col-6">
                                        <button type="button" data-dismiss="modal" class="btn btn-block btn-default"> NO </button>
                                        </div> 
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="alertcart" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Error</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <h6>No se pudo realizar la compra</h6>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
            </div>
            <?php } ?>
           
        </div>
    </section>

</body>