<!--
Ce module affiche des flocons de neige sur toute la page
-->

<!-- Fonction Javascript d'affichage de flocons de neige -->
<script type='text/javascript'>

	var flocons = 20;      // nombre de flocons
	var vitesse = 15000;   // vitesse en ms +- 5 secondes
	var taille  = 1;       // taille des flocons
	var W = window.innerWidth - 201;
	var H = window.innerHeight - 20;
	
	function neige(id) {
		var duree = Math.floor((Math.random()*5)+1)*1000+vitesse;
		var gauche = Math.floor((Math.random()*200)+1);
		id.animate({

			top: "+="+H,
			left : "+="+gauche
		},
		duree,
		function() {
			var taille_flo = Math.floor((Math.random()*20)+10*taille);
			var gauche = Math.floor((Math.random()*W)+1);
			$(this).css('top', -20).css('left', gauche).css('font-size', taille_flo);
			neige(id);
		});
	}
	
	for(var i=0;i<=flocons;i++) {
		var gauche = Math.floor((Math.random()*W)+1);
		var taille_flo = Math.floor((Math.random()*20)+10*taille);
		$("#fond").append('<div class="neige" id="s'+i+'" style="left : '+gauche+'px; font-size : '+taille_flo+'px; ">*</div>');
		neige($("#s"+i));
	}

</script>





