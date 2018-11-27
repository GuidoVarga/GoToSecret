<footer style="display:none;">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootlint/latest/bootlint.min.js"></script>
	<script src="<?php echo "/".DIRECTORY."/"."resources/js/sb-admin-2.js"?>"> </script>
	<script src="<?php echo "/".DIRECTORY."/"."resources/js/metisMenu.js"?>"> </script>
  
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

			let formData = new FormData();

			formData.append("id",event.target.value);

			postRequest(formData,'AdminCategory/delete',redirect('AdminCategory'));
			
		}


		function editLocation(event){
			
			const id = event.target.value;
			redirect("AdminLocation/editView?id="+id);
		}

		function deleteLocation(event){

			let formData = new FormData();
			formData.append("id",event.target.value);
			postRequest(formData,'AdminLocation/delete',redirect('AdminLocation'));

		}

		function postRequest(body,url,callback){

			let request = new XMLHttpRequest;
			request.onload = () => {
				if(request.status == 200){
					console.log(request);
					callback();
				}
				else{
					alert('error:' + request.status);
				}
			};
			request.onerror = () => {
				alert('error:' + request.status);
			}
			request.open('POST',url,true);
			request.send(body);
		}

		function redirect(url){
			window.location.replace(url);
		}

		function addLocation(event){

			event.preventDefault();

			var location = document.getElementById('location').value;
			var json = location.replace(/'/g, '"');
			location = JSON.parse(json);
			console.log(location);

			//var location = document.getElementById('location').value;
			var quantity = document.getElementById('quantity').value;
			var price = document.getElementById('price').value;
			var tBody = document.getElementById('table-body-locations');
			addRow([location,quantity,price],tBody);
			
		}

		function addSubEvent(event){
			//var c = url.searchParams.get("id");
		

			event.preventDefault();

			var artist = document.getElementById('artist').value;
			var json = artist.replace(/'/g, '"');
			artist = JSON.parse(json);
			console.log(artist.name);


			var initialHour = document.getElementById('initial-hour').value;
			var finishHour = document.getElementById('finish-hour').value;
			var tBody = document.getElementById('table-body-subEvents');
			addRow([artist,initialHour,finishHour],tBody);

		}

		function addRow(items,tBody){
			var index = tBody.getElementsByTagName('tr').length;
			let tr = document.createElement('tr');
			/*
			items.forEach(function(item){

				let textNode = document.createTextNode(item);
				let td = document.createElement('td');
				let input = document.createElement('input');
				input.setAttribute('value',item);
				input.setAttribute('hidden','');
				td.appendChild(textNode);
				td.appendChild(input);
				tr.appendChild(td);

			});
			*/

			for(let i=0; i<items.length; i++){

				
				let textNode;
				let td = document.createElement('td');
				let input = document.createElement('input');

				if(i===0){
					textNode = document.createTextNode(items[i].name);
					input.setAttribute('value',items[i].id);
					//input.setAttribute('id','input-')
				}else{
					textNode = document.createTextNode(items[i]);
					input.setAttribute('value',items[i]);
				}
				
				input.setAttribute('hidden','');
				td.appendChild(textNode);
				td.appendChild(input);
				td.setAttribute('id','td-'+i);
				tr.appendChild(td);

			}


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

		function saveSchedule(event){
			event.preventDefault();
			const eventId = location.search.split('id=')[1];
			alert(eventId);
			let date = document.getElementById('date').value;
			let place = document.getElementById('place').value;

			let tableLocations = document.getElementById('table-body-locations');
			let trs = tableLocations.childNodes;

			let subEvents = getSubEventsFromTable();
			let locations=getLocationsFromTable();

			let parametros = {
							"event_id": eventId,
							"date": date,
							"place_id":place,
        	   	"subEvents" :subEvents,
        	   	"locations" :locations
    			};

    	console.log(parametros);

    		$.ajax({

						//Json
						url: 'save',
						type: 'POST',
						data: parametros,
						success : function (){
							redirect('');		
						}
					});
		}


		function updateSchedule(event){
			event.preventDefault();
			const scheduleId = location.search.split('id=')[1];

			let date = document.getElementById('date').value;
			let place = document.getElementById('place').value;

			let tableLocations = document.getElementById('table-body-locations');
			let trs = tableLocations.childNodes;

			let subEvents = getSubEventsFromTable();
			let locations=getLocationsFromTable();

			let parametros = {
							"schedule_id": scheduleId,
							"date": date,
							"place_id":place,
        	   	"subEvents" :subEvents,
        	   	"locations" :locations
    			};

    	console.log(parametros);

    		$.ajax({

						//Json
						url: 'update',
						type: 'POST',
						data: parametros,
						success : function (response){
							console.log(response);
							//redirect('');		
							
						}
					});
		}


		function deleteSchedule(event){
			event.preventDefault();
			const scheduleId = event.target.value;

			let parametros = {
							"schedule_id": scheduleId,
    			};

    	
    		$.ajax({

						//Json
						url: 'AdminSchedule/delete',
						type: 'POST',
						data: parametros,
						success : function (){
							
							redirect('');		
							
						}
					});
					
		}


		function getLocationsFromTable(){

			let tableLocations = document.getElementById('table-body-locations');
			let trs = tableLocations.getElementsByTagName('tr');

			let locations=[];

			for(let i=0; i<trs.length; i++){
				let location={};
				//console.log(trs[i].childNodes);
				let tds=trs[i].getElementsByTagName('td');
				for(let j=0; j<tds.length-1; j++){

					if(j==0){
						location.id=tds[j].getElementsByTagName('input')[0].value;
					}
					else if(j==1){
						location.quantity=tds[j].getElementsByTagName('input')[0].value;
					}
					else if(j==2){
						location.price=tds[j].getElementsByTagName('input')[0].value;
					}
				}
				locations.push(location);
			}

			return locations;
		}


		function getSubEventsFromTable(){

			let tableSubEvents = document.getElementById('table-body-subEvents');
			let trs = tableSubEvents.getElementsByTagName('tr');
			//console.log(trs);
			let subEvents=[];

			for(let i=0; i<trs.length; i++){
				let subEvent={};
				//console.log(trs[i].childNodes);
				let tds=trs[i].getElementsByTagName('td');
			
				for(let j=0; j<tds.length-1; j++){

					if(j==0){
						subEvent.artist_id=tds[j].getElementsByTagName('input')[0].value;
					}
					else if(j==1){
						subEvent.start_hour=tds[j].getElementsByTagName('input')[0].value;
					}
					else if(j==2){
						subEvent.finish_hour=tds[j].getElementsByTagName('input')[0].value;
					}
				}
				subEvents.push(subEvent);
			}

			return subEvents;
		}


		function addEvent(event){

			event.preventDefault();
			let name = document.getElementById('name').value;
			let img = document.getElementById('img');
			let category = document.getElementById('category').value;
			let description = document.getElementById('description').value;
		

			let parametros = {
							"name": name,
							"description": description,
							"img": img,
							"category": category,
						
    			};


    		let formData = new FormData();

			formData.append("name", name);
			formData.append("description", description);
			formData.append("img", img.files[0]);
			formData.append("category", category);
    	
    		$.ajax({

						//Json
						url: 'add',
						type: 'POST',
						data: formData,
						contentType: false,
       					processData: false,
						success : function (response){
							if(response==='ok'){
								redirect('');
							}else{


							alert(response);	
							}
						}
					});


		}

		function updateEvent(event){

			event.preventDefault();
			let id = document.getElementById('id').value;
			let name = document.getElementById('name').value;
			let img = document.getElementById('img');
			let category = document.getElementById('category').value;
			let description = document.getElementById('description').value;
			let oldImg = document.getElementById('oldImg').value;
			let checkbox = document.getElementById('oldImg-check').checked;



    		let formData = new FormData();
    		formData.append("id", id);
			formData.append("name", name);
			formData.append("description", description);
			formData.append("img", img.files[0]);
			formData.append("category", category);
			formData.append("oldImg", oldImg);
			formData.append("checkbox", checkbox);

    	
    		$.ajax({

						//Json
						url: 'update',
						type: 'POST',
						data: formData,
						contentType: false,
       					processData: false,
						success : function (response){
							if(response==='ok'){
								redirect('/GoToSecret/AdminEvent');
							}else{

							console.log(response);
							alert(response);	
							}
						}
					});


		}

		function deleteEvent(event){

			event.preventDefault();
			const eventId = event.target.value;

			let parametros = {
							"event_id": eventId,
    			};

    		$.ajax({

						//Json
						url: 'AdminEvent/delete',
						type: 'POST',
						data: parametros,
						success : function (response){
							console.log(response);
							redirect('');		
							
						}
					});
		}

		function updateArtist(event){
			event.preventDefault();


			let id = location.search.split('id=')[1];
			let name = document.getElementById('name').value;
			let img = document.getElementById('img');
			let description = document.getElementById('description').value;
			//let oldImg = document.getElementById('oldImg').value;
			//let checkbox = document.getElementById('oldImg-check').checked;



    		let formData = new FormData();
    		formData.append("id", id);
			formData.append("name", name);
			formData.append("description", description);
			//formData.append("img", img.files[0]);
			//formData.append("oldImg", oldImg);
			//formData.append("checkbox", checkbox);

    	
    		$.ajax({

						//Json
						url: 'update',
						type: 'POST',
						data: formData,
						contentType: false,
       					processData: false,
						success : function (response){
							if(response==='ok'){
								redirect('/GoToSecret/AdminArtist');
							}else{

							console.log(response);
							alert(response);	
							}
						}
					});

		}

		function addArtist(event){
			event.preventDefault();

			let name = document.getElementById('name').value;
			let img = document.getElementById('img');
			let description = document.getElementById('description').value;
			//let oldImg = document.getElementById('oldImg').value;
			//let checkbox = document.getElementById('oldImg-check').checked;



    		let formData = new FormData();
   
			formData.append("name", name);
			formData.append("description", description);
			//formData.append("img", img.files[0]);
			//formData.append("oldImg", oldImg);
			//formData.append("checkbox", checkbox);

    	
    		$.ajax({

						//Json
						url: 'add',
						type: 'POST',
						data: formData,
						contentType: false,
       					processData: false,
						success : function (response){
							if(response==='ok'){
								redirect('/GoToSecret/AdminArtist');
							}else{

							console.log(response);
							alert(response);	
							}
						}
					});

		}

		function deleteCity(event){

			event.preventDefault();
			const cityId = event.target.value;

			let parametros = {
					"city_id": cityId
    			};

    		$.ajax({

						//Json
						url: 'AdminCity/delete',
						type: 'POST',
						data: parametros,
						success : function (){
						
							redirect('');		
							
						}
					});
		}

		function deletePlace(event){

			event.preventDefault();
			const placeId = event.target.value;

			let parametros = {
					"place_id": placeId
    			};

    		$.ajax({

						//Json
						url: 'AdminPlace/delete',
						type: 'POST',
						data: parametros,
						success : function (){
						
							redirect('');		
							
						}
					});
		}

		

		</script>

	</footer>

	</html>

