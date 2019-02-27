<?php

//--------------------------------
// CALENDRIER LUNAIRE DU JOUR
// Ce module affiche le calendrier lunaire du jardinier récupéré dans un fichier csv.
// du jour détaillé
//--------------------------------

// Lecture du fichier dans un tableau
$fichier = "cal_lunaire.csv";
$cal_lune = file($fichier, FILE_IGNORE_NEW_LINES);
if(!$cal_lune) {
	// erreur de fichier
	$retour_jour .= "Impossible d'ouvrir le fichier ".$fichier;
} else {
	// Récupération du n° de jour actuel (0 à 365)
	$jour = intval(date("z"));
	// Récupération des infos du jour actuel
	$lune_sens = substr($cal_lune[$jour], 0, 1);
	$lune_type = substr($cal_lune[$jour], 2);
	// Détail pour le sens de la lune
	if($lune_sens == "M") {
		// Lune montante
		$lune_sens_detail = "Récolte des fruits, feuilles, fleurs, greffage.";
	} else {
		// Lune descendante
		$lune_sens_detail = "Récolte des racines, taille, plantations, travail du sol.";
	}
	// Détail pour le type de jour
	if((substr($lune_type, 0,1) == "N")){
		$lune_type_detail = "Nœud lunaire : évitez semis, récoltes et travail du sol !";
	} else {
		$lune_type_detail = "Jour favorable aux légumes-".$lune_type."s.";
	}
	// Mise en forme de l'ensemble
	$retour_jour .= "<p class='".$lune_sens."'>".$lune_sens_detail."</p>";
	$retour_jour .= "<p class='".$lune_type."'>".$lune_type_detail."</p>";
}

// Affichage du résultat
echo $retour_jour;

?>