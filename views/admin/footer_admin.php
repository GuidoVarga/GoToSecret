<?php namespace views\admin; ?>
<footer style="display:none;">
	<div id="modal_input_empty" class="modal fade" tab-index="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Error</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">
					<h6>Complete los campos</h6>
				</div>
			</div>
		</div>
	</div>
	<div id="modal_error" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Error</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
			
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootlint/latest/bootlint.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="<?php echo "/".DIRECTORY."/"."resources/js/sb-admin-2.js"?>"> </script>
	<script src="<?php echo "/".DIRECTORY."/"."resources/js/metisMenu.js"?>"> </script>
	
	
  
  	<script>
		$(document).ready(function(){
		$("#searchSurplusQuantity").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
		});
	</script>

	<script>

		$(document).ready(function(){
		$("#searchSoldByCategory").on("change", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
		});
	</script>

	<script>

		function getSurplusAndSoldQuantity(id,eventName){
			     
				 let parametros = {
                        "id": id
                  };
                    
                  $.ajax({

                      //Json
                      url: '/GoToSecret/AdminQuery/getSurplusAndSoldQuantity',
                      type: 'POST',
                      data: parametros,
                      success : function (response){
                          const obj = JSON.parse(response);
                          let surplus=document.getElementById("surplus");
                          let sold=document.getElementById("sold-quantity");
                          let title=document.getElementById("modal-title");
                 		  title.innerHTML=obj.name;
                          surplus.innerHTML=obj.surplus;
                          sold.innerHTML=obj.sold;
                      }
                    });
		}

		function getSurplusAndSoldQuantityByCategory(id){
			     
				 let parametros = {
                        "id": id
                  };
                    
                  $.ajax({

                      //Json
                      url: '/GoToSecret/AdminQuery/getSurplusAndSoldQuantityByCategory',
                      type: 'POST',
                      data: parametros,
                      success : function (response){
                          console.log(response);
                          const obj = JSON.parse(response);

                          let money=document.getElementById("money");
                          let title=document.getElementById("modal-title");
                 		  title.innerHTML=obj.name;
                          money.innerHTML="$ "+obj.sold;
                      }
                    });
		}
		
		function onChangeLocationSelect(event){
			const button=document.getElementById('add-location');
			if(event.target.value){
			 	button.disabled=false;
			}else{
				button.disabled=true;
			}
		}

		function onChangeEventAddForm(event){
			const button=document.getElementById('add-location');
			if(event.target.value){
			 	button.disabled=false;
			}else{
				button.disabled=true;
			}
		}

		function onChangeSubEventSelect(event){
			const button=document.getElementById('add-subEvent');
			if(event.target.value){
			 	button.disabled=false;
			}else{
				button.disabled=true;
			}
		}

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

			if(price && quantity)
				addRow([location,quantity,price],tBody);
			else{
				swal("Error!", "Complete los campos", "error");
				//modal
			}
			
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


			if(initialHour && finishHour)
				addRow([artist,initialHour,finishHour],tBody);
			else{
				swal("Error!", "Complete los campos", "error");
				//modal
			}

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
    		if(subEvents.length>0 && locations.length>0 && date && place){

	    		$.ajax({

							//Json
							url: 'save',
							type: 'POST',
							data: parametros,
							success : function (rta){
								if(rta==='true'){
									redirect('/GoToSecret/AdminSchedule?id='+eventId);		
								}else{
									swal("Error!", "", "error");
									//modal
								}
							}
						});
    		}else{
    			console.log('Debe completar todos los campos y cargar al menos una plaza y un subevento');
				swal("Error!", "Complete los campos y agregue al menos una plaza y un subevento", "error");
				
    		}
		}


		function updateSchedule(event){
			event.preventDefault();
		

			let searchParams = new URLSearchParams(window.location.search);
			const eventId=searchParams.get('eventId');
			const scheduleId=searchParams.get('id');
			console.log(scheduleId);

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

    		if(subEvents.length>0 && locations.length>0 && date && place){
    		
    		$.ajax({

						//Json
						url: 'update',
						type: 'POST',
						data: parametros,
						success : function (response){
							redirect('/GoToSecret/AdminSchedule?id='+eventId);		
						}
					});
    		
    		}else{
    			console.log('Debe completar todos los campos y cargar al menos una plaza y un subevento');
				swal("Error!", "Complete los campos y cargue al menos una plaza y un subevento", "error");
    		}
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
		
			if(name && img && category && description){

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
								redirect('/GoToSecret/AdminEvent');
							}else{


							alert(response);	
							}
						}
					});

    		}
    		else{
				swal("Error!", "Complete los campos", "error");
				
    			//modal
    		}
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

			if(name && category && description && (img || checkbox.checked)){

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
    	else{
    		swal("Error!", "Complete los campos", "error");
    		//modal
    	}

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

	function addArtist(event){
	
		
		event.preventDefault();

		let name = document.getElementById('name').value;
		let img = document.getElementById('img');
		let description = document.getElementById('description').value;
		//let oldImg = document.getElementById('oldImg').value;
		//let checkbox = document.getElementById('oldImg-check').checked;

		if(name && img && description){

			let parametros = {
							"name": name,
							"img": img,
							"description": description,						
				};


			let formData = new FormData();

			formData.append("name", name);
			formData.append("description", description);
			formData.append("img", img.files[0]);
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
						console.log();
					}else{

					console.log(response);
					alert(response);
					}
				}
			});

		}
		else{
			swal("Error!", "Complete los campos", "error");
		}
	}

	function updateArtist(event){
		event.preventDefault();

		let id = location.search.split('id=')[1];
		let name = document.getElementById('name').value;
		let img = document.getElementById('img');
		let description = document.getElementById('description').value;
		let oldImg = document.getElementById('oldImg').value;
		let checkbox = document.getElementById('oldImg-check').checked;

		if (name && description && (img || checkbox.checked)){

			let formData = new FormData();
			formData.append("id", id);
			formData.append("name", name);
			formData.append("description", description);
			formData.append("img", img.files[0]);
			formData.append("oldImg", oldImg);
			formData.append("checkbox", checkbox);
			
			$.ajax({

				//Json
				url: '/GoToSecret/AdminArtist/update',
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
		else{
			swal("Error!", "Complete los campos", "error");
			
		//modal
		}

	}

	
			
    	
    		

		function deleteArtist(event){

			event.preventDefault();
			const artistId = event.target.value;

			let parametros = {
							"artist_id": artistId,
    			};

    		$.ajax({

						//Json
						url: 'AdminArtist/delete',
						type: 'POST',
						data: parametros,
						success : function (response){
							console.log(response);
							redirect('');		
							
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

