<body class="cart">

        <section>
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
                                    <tbody>

                                        <?php if(isset($cart)){


                                            foreach ($cart as $orderLine) {
                                                ?>
                                            <tr>
                                                <td>
                                                 <label for=""><?php echo $orderLine->getEvent()->getName()?></label>
                                                </td>  
                                                <td>
                                                 <label for=""><?php echo $orderLine->getSchedule()->getDay()?></label>
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
                                            </tr>
                                        <?php
                                            }
                                        }
                                          ?>
                                       
                                    <tr style="background-color: #fafafa; color #575757; font-size:2rem;font-weight: 400;text-transform: uppercase; ">
                                        <td colspan="5"></td>
                                        <td align="right">TOTAL</td>
                                        <td align="right">
                                            $<?php if(isset($total)){
                                                echo $total;
                                            }?>
                                        </td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</body>