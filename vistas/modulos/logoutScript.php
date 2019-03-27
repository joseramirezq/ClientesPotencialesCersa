<script>
$(document).ready(function(){
    $('.btn-exit-system').on('click', function(e){
			e.preventDefault();
			var Token=$(this).attr('href')
			swal({
			title: "¿Esta seguro?",
			text: "Usted esta por salir del sistema",
			icon: "warning",
			buttons: ["Cancelar", true],
			})
			.then((willDelete) => {
			if (willDelete) {
						$.ajax({
						url:'<?php echo SERVERURL ;?>ajax/loginAjax.php?Token='+Token,
						success:function(data){
								if(data=="true"){
									window.location.href="<?php echo SERVERURL ;?>login";
								}
								else{
									swal(
										"Ocurrio un error",
										"No se pudo cerrar la sesion",
										"error"
									)
								}
						}
					});
					
			} else {
			
			}
			});
	});


	$('.btn-curso-system').on('click', function(e){
			e.preventDefault();
			var Curso=$(this).attr('href')
			swal({
			title: "¿Esta seguro?",
			text: "Usted va iniciar sesion en este curso, nadie mas podrá ingresar a la configuracion de este curso",
			icon: "warning",
			buttons: ["Cancelar", true],
			})
			.then((willDelete) => {
			if (willDelete) {
						$.ajax({
						url:'<?php echo SERVERURL ;?>ajax/sesionCursoAjax.php?Curso='+Curso,
						success:function(data){
								if(data=="true"){
									window.location.href="<?php echo SERVERURL ;?>sesioncurso?Curso='+Curso";
								}
								else if(data=="ocupado"){
									
									
									window.location.href="<?php echo SERVERURL ;?>sesioncurso?Curso='+Curso";
									
								}else{
									swal(
										"Ocurrio un error",
										"No se puedo iniciar sesion en este curso",
										"error"
									)
								}
						}
					});
					
			} else {
			
			}
			});
	});



	
	$('.btn-cerrar-curso').on('click', function(e){
			e.preventDefault();
			var Especialidad=$(this).attr('href')
			swal({
			title: "¿Esta seguro?",
			text: "Usted va ha cerrar sesion de este curso",
			icon: "warning",
			buttons: ["Cancelar", true],
			})
			.then((willDelete) => {
			if (willDelete) {
						$.ajax({
						url:'<?php echo SERVERURL ;?>ajax/cerrarCursoAjax.php?Especialidad='+Especialidad,
						success:function(data){
								if(data=="true"){
									window.location.href="<?php echo SERVERURL ;?>home";
							
								}else{
									swal(
										"Ocurrio un error",
										"No se puedo cerrar sesion",
										"error"
									)
								}
						}
					});
					
			} else {
			
			}
			});
	});

});
</script>