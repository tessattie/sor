$( document ).ready(function() {

    $('#type-carte').change(function(){
    	if($(this).val() == 2){
    		$('.display-none').slideDown();
    	}else{
    		$('.display-none').slideUp();
    	}
    	
    })

    $('#myTab a').click(function(e) {
	  e.preventDefault();
	  $(this).tab('show');
	  $('.nav-link').each(function(){
			$(this).removeClass('active');
		})
		$(this).addClass("active");
	});
// store the currently selected tab in the hash value
	$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
	  var id = $(e.target).attr("href").substr(1);
	  window.location.hash = id;
	});

	// on load of the page: switch to the currently selected tab
	var hash = window.location.hash;
	if(!hash){
		hash = "#profile";
	}
	
	$('#myTab a[href="' + hash + '"]').tab('show');
	$('#myTab a[href="' + hash + '"]').addClass('active');
	$('#myTab a[href="' + hash + '"]').parent().removeClass('active');

	$('#productsTable').DataTable();
	$('#customersTable').DataTable();
	$('#customersProductsTable').DataTable();
	$('#usersTable').DataTable({'order' : [], "lengthMenu": [[-1, 10, 25, 50], ["All",10, 25, 50]]});
	$('#vendorsTable').DataTable();
	$('#cartTable').DataTable();
	$('#ordersTable').DataTable();
	$('#cpTable').DataTable();
	$('#contactsTable').DataTable();
	$('#custCont').DataTable();
	$('#inventoryTable').DataTable();
	$('#vendorsProducts').DataTable();

	$('.selectpicker').selectpicker();


});