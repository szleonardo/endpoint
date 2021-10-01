$(document).ready(function(){

	$('#tabela').empty();

	$.ajax({
		type:'post',
		dataType: 'json',
		url: 'getDados.php',

		success: function(dados){
			for(var i=0;dados.length>i;i++){
				$('#tabela').append('<tr><td>'+dados[i].nome_mov+'</td><td>'+dados[i].nome+'</td><td>'+dados[i].valor+'</td><td>'+dados[i].data+'</td><td>'+dados[i].ranking+'</td></tr>');
			}
		}
	});
});