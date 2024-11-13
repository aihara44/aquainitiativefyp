var manageProductTable;

$(document).ready(function() {
	// top nav bar 
	$('#navDeliveries').addClass('active');
	// manage product data table
	manageProductTable = $('#manageProductTable').DataTable({
		'ajax': 'php_action/fetchShopee.php',
		'order': []
	});
    
    // // product form reset
		$("#submitProductForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');   

		// submit product form
		$("#submitProductForm").unbind('submit').bind('submit', function() {

			// form validation
			var username = $("#username").val();
			var do_number = $("#do_number").val();
            var customer_id = $("#customer_id").val();
            var customer_name = $("#customer_name").val();
            var address = $("#address").val();
            var date = $("#date").val();
			var brandName = $("#brandName").val();
			var type = $("#type").val();
            var quantity = $("#quantity").val();
            var brandName2 = $("#brandName2").val();
			var type2 = $("#type2").val();
            var quantity2 = $("#quantity2").val();
            var brandName3 = $("#brandName3").val();
			var type3 = $("#type3").val();
            var quantity3 = $("#quantity3").val();
			var platform = $("#platform").val();
			var deliveryStatus = $("#deliveryStatus").val();
	
			if(username == "") {
				$("#username").closest('.center-block').after('<p class="text-danger">Username field is required</p>');
				$('#username').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#username").find('.text-danger').remove();
				// success out for form 
				$("#username").closest('.form-group').addClass('has-success');	  	
			}	// /else
            
            if(do_number == "") {
				$("#do_number").after('<p class="text-danger">DO Number field is required</p>');
				$('#do_number').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#do_number").find('.text-danger').remove();
				// success out for form 
				$("#do_number").closest('.form-group').addClass('has-success');	  	
			}	// /else
            
            if(customer_id == "") {
				$("#customer_id").after('<p class="text-danger">Customer ID field is required</p>');
				$('#customer_id').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#customer_id").find('.text-danger').remove();
				// success out for form 
				$("#customer_id").closest('.form-group').addClass('has-success');	  	
			}	// /else
            
            if(customer_name == "") {
				$("#customer_name").after('<p class="text-danger">Customer Name field is required</p>');
				$('#customer_name').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#customer_name").find('.text-danger').remove();
				// success out for form 
				$("#customer_name").closest('.form-group').addClass('has-success');	  	
			}	// /else
            
            if(address == "") {
				$("#address").after('<p class="text-danger">Address field is required</p>');
				$('#address').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#address").find('.text-danger').remove();
				// success out for form 
				$("#address").closest('.form-group').addClass('has-success');	  	
			}	// /else
            
            if(date == "") {
				$("#date").after('<p class="text-danger">Date field is required</p>');
				$('#date').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#date").find('.text-danger').remove();
				// success out for form 
				$("#date").closest('.form-group').addClass('has-success');	  	
			}	// /else
            
			if(brandName == "") {
				$("#brandName").after('<p class="text-danger">Brand Name field is required</p>');
				$('#brandName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#brandName").find('.text-danger').remove();
				// success out for form 
				$("#brandName").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(type == "") {
				$("#type").after('<p class="text-danger">Type field is required</p>');
				$('#type').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#type").find('.text-danger').remove();
				// success out for form 
				$("#type").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(quantity == "") {
				$("#quantity").after('<p class="text-danger">Quantity field is required</p>');
				$('#quantity').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#quantity").find('.text-danger').remove();
				// success out for form 
				$("#quantity").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(platform == "") {
				$("#platform").after('<p class="text-danger">Platform field is required</p>');
				$('#platform').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#platform").find('.text-danger').remove();
				// success out for form 
				$("#platform").closest('.form-group').addClass('has-success');	  	
			}	// /else
            
            if(deliveryStatus == "") {
				$("#deliveryStatus").after('<p class="text-danger">Delivery Status field is required</p>');
				$('#deliveryStatus').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#deliveryStatus").find('.text-danger').remove();
				// success out for form 
				$("#deliveryStatus").closest('.form-group').addClass('has-success');	  	
			}	// /else


			if(username && do_number && customer_id && customer_name && address && date && brandName && type && quantity && platform && deliveryStatus) {
				// submit loading button
				$("#createProductBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					success:function(response) {
                        // submit loading button
							$("#createProductBtn").button('reset');

						if(response.success == true) {
							
							// reload the manage student table
							manageProductTable.ajax.reload(null, true);
                            
							$("#submitProductForm")[0].reset();

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');
																	
							// shows a successful message after operation
							$('#add-product-messages').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert

		          

							

						} // /if response.success
						
					} // /success function
				}); // /ajax function
			}	 // /if validation is ok 					

			return false;
		}); // /submit product form
	// remove product 	
}); // document.ready fucntion

function editDelivery(deliveryId = null) {

	if(deliveryId) {
		$("#deliveryId").remove();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedDelivery.php',
			type: 'post',
			data: {deliveryId: deliveryId},
			dataType: 'json',
			success:function(response) {		
			// alert(response.product_image);
				// modal spinner
                $('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');

				// $("#editProductImage").fileinput({
		  //     overwriteInitial: true,
			 //    maxFileSize: 2500,
			 //    showClose: false,
			 //    showCaption: false,
			 //    browseLabel: '',
			 //    removeLabel: '',
			 //    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			 //    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			 //    removeTitle: 'Cancel or reset changes',
			 //    elErrorContainer: '#kv-avatar-errors-1',
			 //    msgErrorClass: 'alert alert-block alert-danger',
			 //    defaultPreviewContent: '<img src="stock/'+response.product_image+'" alt="Profile Image" style="width:100%;">',
			 //    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
		  // 		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
				// });  

				// product id 
				$(".editProductFooter").append('<input type="hidden" name="deliveryId" id="deliveryId" value="'+response.online_id+'" />');
				// status
				$("#editDeliveryStatus").val(response.active);

				// update the product data function
				$("#editProductForm").unbind('submit').bind('submit', function() {

					var deliveryStatus = $("#editDeliveryStatus").val();
								

					if(deliveryStatus == "") {
						$("#editDeliveryStatus").after('<p class="text-danger">Delivery Status field is required</p>');
						$('#editDeliveryStatus').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editDeliveryStatus").find('.text-danger').remove();
						// success out for form 
						$("#editDeliveryStatus").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(deliveryStatus) {
						// submit loading button
						$("#editProductBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							success:function(response) {
								console.log(response);
								if(response.success == true) {
									// submit loading button
									$("#editProductBtn").button('reset');
									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);	
									// shows a successful message after operation
									$('#edit-product-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageProductTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // update the product data function
			} // /success function
		}); // /ajax to fetch product image

				
	} else {
		alert('error please refresh the page');
	}
} // /edit product function