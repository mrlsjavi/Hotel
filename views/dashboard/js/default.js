$(function(){
	//json --javascript object notation --notacion de objetos de javscript

	$.get('dashboard/xhrGetListings', function(o){
		//en o esta el arreglo 
		//console.log(o[0].text);

		for(var i=0; i<o.length; i++){
			$('#listInserts').append('<div>'+o[i].text+'<a class="del" rel="'+o[i].dataid+'" href="#">X</a></div>');
		}

		$('#listInserts').on('click', '.del', function(){

			delItem = $(this);	
			var id = $(this).attr('rel');
			//para mostrar los que voy poniendo sin recargar toda la lista
			$.post('dashboard/xhrDeleteListing', {'dataid' : id}, function(o){
				//esto no lo hace 
				alert("quitar");
				delItem.parent().remove();
				
				//para quitar el div donde estaba

			}, 'json');



			return false;
			//para que no vaya al link
		});


	}, 'json');


	


	
	$('#randomInsert').submit(function(){
		var url = $(this).attr('action');
		var data = $(this).serialize();
		alert("d");
		//tiene un callback function 
		$.post(url, data, function(o){//para mostrar los que voy poniendo sin recargar toda la lista
			//alert(o.id);
			$('#listInserts').append('<div>'+o.text+'<a class="del" rel="'+o.dataid +'" href="#">X</a><div/>');
			
		}, 'json');

		return false;
	});


	
});//fin function