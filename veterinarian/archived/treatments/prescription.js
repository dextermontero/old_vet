$(document).ready(function() {
	$('#prescription tbody').on('click', '.recover-prescription', function (e) {
		e.preventDefault();
		var id = $(this).attr('id');
		$.post("recover_prescription.php", {id:id})
		.done(function(data){
			if(data == "success"){
				Swal.fire({
					title : "Recover Prescription",
					icon : "success",
					html: "<strong>Success! </strong>recover prescription.",
					timer: 3000,
					showConfirmButton:false							
				}).then(function() {
					location.reload();
				});											
			}else{
				Swal.fire({
					title : "Recover Prescription",
					icon : "warning",
					html: "<strong>WARNING! </strong>Something wrong in recover prescription.",
					timer: 3000,
					showConfirmButton:false							
				});							
			}
		});
	});
});
$(document).ready(function() {
	$('#prescription tbody').on('click', '.delete-prescription', function (e) {
		e.preventDefault();
		var id = $(this).attr('id');
	});
});