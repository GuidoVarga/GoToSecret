<?php namespace views\user; ?>
<!-- Footer -->
<footer class="page-footer font-small blue-grey lighten-5">

  <div style="background-color: #443d3d;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Conectate con nosotros vía redes sociales!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic" href="https://www.facebook.com/">
            <i class="fab fa-facebook white-text mr-4 fa-2x"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic" href="https://twitter.com/">
            <i class="fab fa-twitter white-text mr-4 fa-2x"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic" href="https://plus.google.com/discover">
            <i class="fab fa-google-plus white-text mr-4 fa-2x"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic" href="https://www.instagram.com/">
            <i class="fab fa-instagram white-text fa-2x"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3 dark-grey-text">

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 col-xl-3 mb-4">

        <!-- Content -->
        <img class="img-responsive logo m-auto d-block m-left-auto m-right-auto" src="<?php ROOT ?>resources/images/logo-white.png" alt="GoToEvent">
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Empresa dedicada a la venta y distribución de tickets</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
            <?php /*?>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Products</h6>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a class="dark-grey-text" href="#!">MDBootstrap</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="#!">MDWordPress</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="#!">BrandFlow</a>
                </p>
                <p>
                    <a class="dark-grey-text" href="#!">Bootstrap Angular</a>
                </p>

            </div>

            <?php */?>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

              <!-- Links -->
              <h6 class="text-uppercase font-weight-bold">Menu</h6>
              <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <?php if(isset($uer)){
                ?>
                <p>
                <a class="dark-grey-text" href="#!">Mi Cuenta</a>
              </p> <?php
              }?>
              
              <p>
                <a class="dark-grey-text" href="#!">Help</a>
              </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

              <!-- Links -->
              <h6 class="text-uppercase font-weight-bold">Contacto</h6>
              <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <i class="fa fa-home mr-3"></i> Constitución 1000, Mar del Plata, Argentina</p>
                <p>
                  <i class="fa fa-envelope mr-3"></i> gotoevent@gmail.com</p>
                  <p>
                    <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>

                  </div>
                  <!-- Grid column -->

                </div>
                <!-- Grid row -->

              </div>
              <!-- Footer Links -->

              <!-- Copyright -->
              <div class="footer-copyright text-center text-white py-3">© 2018 Copyright:
                <a class="text-primary" href="">We Made Code</a>
              </div>
              <!-- Copyright -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
              <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootlint/latest/bootlint.min.js"></script>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

               <script js>
                function searchArtist() {
                  var input, filter, cards, cardContainer, h5, title, i;
                  input = document.getElementById("search");
                  filter = input.value.toUpperCase();
                  cardContainer = document.getElementById("myItems");
                  cards = cardContainer.getElementsByClassName("contener-card");
                  for (let i = 0; i < cards.length; i++) {
                      title = cards[i].querySelector(".card-body h5.card-title");
                      if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                        cards[i].style.display = "block";
                          setTimeout(function() {
                            cards[i].classList.remove('fade-card');
                        }, 300); // 1000ms = 1 second
                      } else {
                        cards[i].classList.add('fade-card');
                        setTimeout(function() {
                            cards[i].style.display = "none";
                        }, 300); // 1000ms = 1 second
                      }
                  }
                }

                function searchCategory() {
                  var input, filter, cards, cardContainer, h5, title, i;
                  var input = document.getElementById("search");
                  var filter = input.value.toUpperCase();
                  var cardContainer = document.getElementById("myItems");
                  var cards = cardContainer.getElementsByClassName("contener-card");
                  for (let i = 0; i < cards.length; i++) {
                      title = cards[i].querySelector(".card-body p");
                      if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                          //cards[i].style.display = "";
                          cards[i].style.display = "block";
                          setTimeout(function() {
                            cards[i].classList.remove('fade-card');
                        }, 100); // 1000ms = 1 second
                          
                      } else {
                          cards[i].classList.add('fade-card');
                          setTimeout(function() {
                            cards[i].style.display = "none";
                        }, 300); // 1000ms = 1 second
                      }
                  }
                }

                function addToCart(event){

                        event.preventDefault();
                        const scheduleId = location.search.split('id=')[1];

                        let eventId = document.getElementById('event_id').value;
                        let quantity = document.getElementById('quantity').value;
                        let locationId = document.querySelector('input[name = "location"]:checked').value;

                        let parametros = {
                                "schedule_id": scheduleId,
                                "quantity": quantity,
                                "location_id": locationId,
                                "event_id": eventId
                            };

                        console.log(parametros);

                          $.ajax({

                              //Json
                              url: 'Schedule/addToCart',
                              type: 'POST',
                              data: parametros,
                              success : function (response){
                                if(response=='true')
                                    redirect('/GoToSecret/Cart');
                                else{
                                  console.log(response);
                                  swal({
                                  title: "Hubo un error!",
                                  text: "Cantidad no disponible",
                                  icon: "error",
                                });
                                }

                                
                              }
                            });
             }
             function deleteCartLine(event){
                event.preventDefault();
                const tr = event.target.parentElement.parentElement;
                const orderLineId = tr.childNodes[1].childNodes[1].value;

                const tbody = document.getElementById('cart-tbody');
                console.log(orderLineId);
                let parametros = {
                        "orderLineId": orderLineId,
                    };
                    
                  $.ajax({

                      //Json
                      url: 'Cart/deleteItem',
                      type: 'POST',
                      data: parametros,
                      success : function (response){
                          console.log(response);
                          const total=document.getElementById('total');
                          total.innerHTML="";
                          total.innerText=response;
                          console.log(total);
                          tr.parentElement.removeChild(tr);        
                          checkButtonConfirm();
                      }
                    });
        
              }

              function confirmOrder(event){
                event.preventDefault();
                
                  $.ajax({

                      //Json
                      url: 'Cart/confirmOrder',
                      type: 'POST',
                      success : function (response){
                        console.log(response);
                            const obj = JSON.parse(response);
                            redirect('/GoToSecret/Order?id='+obj.id+'&order='+obj.token);
                      }
                    });
                
              }

              window.onload = function(){

                checkButtonConfirm();
              }

              function checkButtonConfirm() {

                  const tbody = document.getElementById('cart-tbody');
                  if(!tbody.getElementsByTagName('tr')[0]){
                      document.getElementById('button-order-confirm').disabled=true;
                  }
              }


              function buttonRegisterValidation(){
                  console.log('validation');
                  const name = document.getElementById('name-register').value;
                  const lastName = document.getElementById('lastname-register').value;
                  const password = document.getElementById('password-register').value;
                  const passwordRepeat = document.getElementById('password-repeat').value;

                  if(name!='' && lastName != '' && password != '' && passwordRepeat !=''){
                      document.getElementById('btn_register').disabled=false;
                  }


              }

              function registerAjax(event){



                  event.preventDefault();
                  var name = $('#name-register').val();
                  var lastname = $('#lastname-register').val();
                  var email = $('#email-register').val();
                  var password = $('#password-register').val();
                  var passwordRepeat = $('#password-repeat').val();

                  if(password===passwordRepeat){
                    email=email.toLowerCase();

                    var parametros = {
                      "name" : name,
                      "lastname": lastname,
                      "email" : email,
                      "password" : password
                    }

                     $.ajax({

                      //Json
                      url: 'Register/validateEmail',
                      type: 'POST',
                      data: parametros,
                      success : function (response){
                              if(response==='ok'){
                                swal("Registro","Registro Exitoso!","success")
                                .then(value => redirect(''));
                              }
                              else if(response==='email'){
                                document.getElementById('email-register').style.border="solid 1px red";
                                document.getElementById('email-error').style.display="block";
                                console.log(response);
                              } 
                              else{
                                console.log(response);
                                swal("Error", response, "error");
                              }                     
                      }
                    });
                  }
                  else{
                     document.getElementById('password-repeat').style.border="solid 1px red";
                    document.getElementById('password-error').style.display="block";
                  }
                

              }

              </script>   

              <script>/*
                var btn_submit=document.getElementById('btn_register');
                var input_email=document.getElementById('email');
                btn_submit.onclick = function(event){


                  event.preventDefault();
                  var name = $('#name-register').val();
                  var lastname = $('#lastname-register').val();
                  var email = $('#email-register').val();
                  var password = $('#password-register').val();

                  if(email!=null){
                    email=email.toLowerCase();

                    var parametros = {
                      name : name,
                      lastname: lastname,
                      email : email,
                      password : password
                    }
                    getRequest(parametros,'Register/validateEmail',redirect())
                  }
                };
                */


                
              </script>
              
              <script>


                var btn_submit=document.getElementById('btn_login');
                var input_email=document.getElementById('email');
                btn_submit.onclick = function(event){


                  event.preventDefault();
                  var email = $('#email-login').val();
                  var password = $('#password-login').val();

                  if(email!=null){
                    email=email.toLowerCase();

                    var parametros = {
                      "email" : email,
                      "password" : password
                    }



                     $.ajax({

                      //Json
                      url: 'Login/validateLogin',
                      type: 'POST',
                      data: parametros,
                      success : function (response){
                            redirect('/GoToSecret/Home');
                      }
                    });

                    //getRequest(parametros,'Login/validateLogin',console.log('hola'));
                  }

                };

                function getRequest(body,url,callback){
                  let request = window.ActiveXObject ?
                  new ActiveXObject('Microsoft.XMLHTTP') :
                  new XMLHttpRequest;
                  request.onload = () => {
                    if(request.status == 200){

                      if(request.response==true){
                        callback();
                        console.log(request);
                      }
                      else{
                        alert('Credenciales incorrectas');
                      }
                    }
                    else{
                      alert('error:' + request.status);
                    }
                  };
                  request.onerror = () => {
                    alert('error:' + request.status);
                  }
                  request.open('POST',url,true);
                  request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                  request.send("email="+body.email+ "&password="+body.password);
                }

                function redirect(url){
                  if(url)
                    window.location.replace(url);
                  else
                    window.location.replace('/GoToSecret');
                }

              function doHashCode(string) {
                    String.prototype.hashCode = function () {
                        var text = "";
                        var possible = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

                        for (var i = 0; i < 255; i++)
                            text += possible.charAt(Math.floor(Math.random() * possible.length));
                        return text;
                    }

                  const hash = new String().hashCode(string);
                   return hash;

            }

              </script>

            </footer>
            <!-- Footer -->



            </html>