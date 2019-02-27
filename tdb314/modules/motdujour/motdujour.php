<?php

//--------------------------------
// MOT DU JOUR
// Ce module affiche un "mot du jour" récupéré dans un fichier txt.
// (il peut s'agir de dictons, de citations, des saints dujour, etc.)
//--------------------------------

// Fonction permettant de lire un numéro de ligne du fichier txt
function AfficherLigne($txt, $ligne) {
	// Saut de la ligne du 29 février pour les années non bissextiles
	if((date("L") == "0") && ($ligne > 59)) {
		$ligne++;
	}
	// Ouverture en lecture seule du fichier récupéré
	$fichier = @fopen($txt, "r");
	// Si le fichier existe et a pu être ouvert
	if($fichier) {
		// Tant que $actuelle n'équivaut pas à $ligne,
		// on boucle en incrémentant $actuelle de 1
		for($actuelle = 1; $actuelle <= $ligne; $actuelle++) {
			// Attribution de la ligne en cours à $temp
			// tant que la limite définie ou la fin du fichier n'a pas été
			// atteinte, la boucle est relancée et $contenu mis à jour
			$temporaire = fgets($fichier);
			if(empty($temporaire)) {
				break;
			} else {
				$contenu = $temporaire;
			}
		}
	
	// Si le fichier n'existe pas ou n'a pas pu être ouvert
	} else {
		// Attribution d'un message d'erreur à $contenu
		$contenu = "Erreur d'ouverture de <em>".$txt."</em>";
	}
	// Fermeture du fichier
	@fclose($fichier);
	// Retour de la ligne lue
	return $contenu;
}
	
// Récupération du fichier où sont stockés les "mots du jour"
if(!empty($_GET['fichier'])) {
	$txt = $_GET['fichier'];
} else {
	$txt = 'dictons.txt';
}

// Récupération du n° de jour actuel
$jour = intval(date("z")) + 1;
// Récupération du mot du jour associé
$motdujour = AfficherLigne($txt, $jour);
// Mise en forme (les # sont des sauts de ligne)
$motdujour = str_replace('#', '<br />', $motdujour);
// Affichage du résultat
echo '<quotation><quote>'.$motdujour.'</quote></quotation>';

?> 