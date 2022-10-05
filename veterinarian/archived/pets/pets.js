$(document).ready(function() {
	$('#prescription tbody').on('click', '.recover-pet', function (e) {
		e.preventDefault();
		var id = $(this).attr('id');
		$.post("recover_pets.php", {id:id})
		.done(function(data){
			if(data == "success"){
				Swal.fire({
					title : "Recover Pet",
					icon : "success",
					html: "<strong>Success! </strong>recover pet.",
					timer: 3000,
					showConfirmButton:false							
				}).then(function() {
					location.reload();
				});														
			}else{
				Swal.fire({
					title : "Recover Pet",
					icon : "warning",
					html: "<strong>WARNING! </strong>Something wrong in recover pet.",
					timer: 3000,
					showConfirmButton:false							
				});
			}			
		});
	});
});	

$(document).ready(function() {
	$('#prescription tbody').on('click', '.delete-pet', function (e) {
		e.preventDefault();
		var id = $(this).attr('id');

	});
});	