<footer>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootlint/latest/bootlint.min.js"></script>
	<script src="<?php echo "/".DIRECTORY."/"."resources/js/sb-admin-2.js"?>"> </script>
	<script src="<?php echo "/".DIRECTORY."/"."resources/js/metisMenu.js"?>"> </script>

	<script>
		/*
		var btn_submit=document.getElementById('btn_login');
		var input_email=document.getElementById('email');
		btn_submit.onclick = function(event){


			event.preventDefault();
			var email = $('#email-login').val();
			var password = $('#password-login').val();

			if(email!=null){
				email=email.toLowerCase();

				var parametros = {
					email : email,
					password : password
				}
				getRequest(parametros,'Login/validateLogin',redirect())
			}
		};
		*/
		function editCategory(event){
			
			const id = event.target.value;
			redirect("AdminCategory/EditView?id="+id);
		}

		function deleteCategory(event){
	
			var parametros = {
					id : event.target.value
				}

			postRequest(parametros,'AdminCategory/delete',redirect());
		}


		function editLocation(event){
			
			const id = event.target.value;
			redirect("AdminLocation/editView?id="+id);
		}

		function deleteLocation(event){
	
			var parametros = {
					id : event.target.value
				}

			postRequest(parametros,'AdminLocation/delete',redirect('AdminLocation'));
		}

		function postRequest(body,url,callback){
			let request = window.ActiveXObject ?
			new ActiveXObject('Microsoft.XMLHTTP') :
			new XMLHttpRequest;
			request.onload = () => {
				if(request.status == 200){
						callback();
						console.log(request);
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
			request.send("id="+body.id);
			console.log(request);
		}

		function redirect(url){
			window.location.replace(url);
		}
	</script>

</footer>

</html>