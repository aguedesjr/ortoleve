// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable(
		  {
			  responsive: true,
		      "language": {
	            "lengthMenu": "Mostrando _MENU_ usuários por página",
	            "zeroRecords": "Nenhum dado encontrado",
	            "info": "Mostrando página _PAGE_ de _PAGES_",
	            "infoEmpty": "Nenhum dado disponível",
	            "infoFiltered": "(filtrando a partir de _MAX_ dados encontrados)",
	            "sSearch": "Procurar",
	            "paginate": {
	                "previous": "Antorior",
	                "next": "Próximo"
	              }
	        }
		  }
		  );
});
