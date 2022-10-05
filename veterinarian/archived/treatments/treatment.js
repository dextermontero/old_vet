$(document).ready(function() {
	$('#pet_treatment tbody').on('click', '.recover-treatment', function (e) {
		e.preventDefault();
		var id = $(this).attr('id');
		$.post("recover_treatment.php", {id:id})
		.done(function(data){
			if(data == "success"){
				Swal.fire({
					title : "Recover Pet Treatment",
					icon : "success",
					html: "<strong>Success! </strong>recover pet treatment.",
					timer: 3000,
					showConfirmButton:false							
				}).then(function() {
					location.reload();
				});														
			}else{
				Swal.fire({
					title : "Recover Pet Treatment",
					icon : "warning",
					html: "<strong>WARNING! </strong>Something wrong in recover pet treatment.",
					timer: 3000,
					showConfirmButton:false							
				});					
			}
		});
	});
});
$(document).ready(function() {
	$('#pet_treatment tbody').on('click', '.delete-treatment', function (e) {
		e.preventDefault();
		var id = $(this).attr('id');
	});
});