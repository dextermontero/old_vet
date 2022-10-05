$(document).ready(function() {
	$('#branch tbody').on('click', '.recover-branch', function (e) {
		e.preventDefault();
		var id = $(this).attr('id');
		$.post("recover_branch.php", {id:id})
		.done(function(data){
			if(data == "success"){
				Swal.fire({
					title : "Recover Branch",
					icon : "success",
					html: "Successfully recovered branch information.",
					timer: 3000,
					showConfirmButton:false							
				}).then(function() {
					location.reload();
				});														
			}else{
				Swal.fire({
					title : "Recover Service",
					icon : "warning",
					html: "Something wrong in recover branch information.",
					timer: 3000,
					showConfirmButton:false							
				});							
			}
		});
	});
});	
$(document).ready(function() {
	$('#branch tbody').on('click', '.delete-branch', function (e) {
		e.preventDefault();
		var id = $(this).attr('id');
	});
});