$(document).ready(function() {

	$("#startDate").datepicker();
	// order date picker
	$("#endDate").datepicker();

	$("#getOrderReportForm").unbind('submit').bind('submit', function() {
		
		var startDate = $("#startDate").val();
		var endDate = $("#endDate").val();
		var servicio = $("#servicios").val();
		if(startDate == "" || endDate == "") {
			if(startDate == "") {
				$("#startDate").closest('.form-group').addClass('has-error');
				$("#startDate").after('<p class="text-danger">La fecha inicial es requerida</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}

			if(endDate == "") {
				$("#endDate").closest('.form-group').addClass('has-error');
				$("#endDate").after('<p class="text-danger">La fecha final es requerida</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}
		}		
		 else if(startDate > endDate){
		 		$("#startDate").closest('.form-group').addClass('has-error');
				$("#startDate").after('<p class="text-danger">La fecha inicial es mayor que la final</p>');

		 }
		    else
		    {
			$(".form-group").removeClass('has-error');
			$(".text-danger").remove();

			VentanaCentrada('./pdf/documentos/ver_reporte.php?startDate='+startDate+'&endDate='+endDate+'&servicio='+servicio,'Reporte','','1024','768','true');
			
		} // /else

		return false;
	});
});