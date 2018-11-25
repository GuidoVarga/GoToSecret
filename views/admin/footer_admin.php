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

		function addLocation(event){

			event.preventDefault();

			var location = document.getElementById('location').value;
			var quantity = document.getElementById('quantity').value;
			var price = document.getElementById('price').value;
			var tBody = document.getElementById('table-body-locations');
			addRow([location,quantity,price],tBody);
			
		}

		function addSubEvent(event){

			event.preventDefault();

			var artist = document.getElementById('artist').value;
			var initialHour = document.getElementById('initial-hour').value;
			var finishHour = document.getElementById('finish-hour').value;
			var tBody = document.getElementById('table-body-subEvents');
			addRow([artist,initialHour,finishHour],tBody);

		}

		function addRow(items,tBody){
			var index = tBody.getElementsByTagName('tr').length;
			console.log(index);
			
			let tr = document.createElement('tr');
			items.forEach(function(item){
				let textNode = document.createTextNode(item);
				let td = document.createElement('td');
				td.appendChild(textNode);
				tr.appendChild(td);
			});
			let button = document.createElement('button');
			button.className='btn btn-danger btn-sm fas fa-trash-alt';
			button.value=index;
			button.addEventListener('click',function(event){
				deleteRow(event,tBody)},false);
			let td = document.createElement('td');
			td.appendChild(button);
			tr.appendChild(td);
			tBody.appendChild(tr);
		}

		function deleteRow(event){
			event.preventDefault();
			let button = event.target;
			let tr=button.parentElement.parentElement;

			tr.parentNode.removeChild(tr);

		}
	</script>

	<script>
		$(document).ready(function(){
		$("#search").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
		});
	</script>

</footer>

</html>