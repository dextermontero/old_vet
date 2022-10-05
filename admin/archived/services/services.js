$(document).ready(function() {
	$('.recover-service').click(function(e) {
		e.preventDefault();
		var id = $(this).attr('id');
		$.post("recover_services.php", {id:id})
		.done(function(data){
			if(data == "success"){
				Swal.fire({
					title : "Recover Service",
					icon : "success",
					html: "Successfully Recovered service information.",
					timer: 3000,
					showConfirmButton:false							
				}).then(function() {
					location.reload();
				});														
			}else{
				Swal.fire({
					title : "Recover Service",
					icon : "warning",
					html: "Failed Recovered service information.",
					timer: 3000,
					showConfirmButton:false							
				});							
			}
		});
	});
});	
$(document).ready(function() {
	$('.delete-service').click(function(e) {
		e.preventDefault();
		var id = $(this).attr('id');
	});
});