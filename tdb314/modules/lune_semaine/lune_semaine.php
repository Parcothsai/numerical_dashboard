<?php

//--------------------------------
// CALENDRIER LUNAIRE HEBDOMADAIRE
// Ce module affiche le calendrier lunaire du jardinier récupéré dans un fichier csv.
// sur une semaine
//--------------------------------

// Lecture du fichier dans un tableau
$fichier = "cal_lunaire.csv";
$retour_semaine = "<div id='semaine'>";
$cal_lune = file($fichier, FILE_IGNORE_NEW_LINES);
if(!$cal_lune) {
	// erreur de fichier
	$retour_semaine .= "Impossible d'ouvrir le fichier ".$fichier;
} else {
	// Récupération du n° de jour actuel (0 à 365)
	$jour = intval(date("z"));
	// pour les 7 jours à compter du jour actuel
	for($i = 0; $i < 7; $i++) {
		$lune_sens = substr($cal_lune[$jour], 0, 1);
		$lune_type = substr($cal_lune[$jour], 2);
		$retour_semaine .= "<div class='jour'><ul><li class='sens ".$lune_sens."'></li>";
		$retour_semaine .= "<li class='type ".$lune_type."'></li></ul></div>";
		$jour++;
	}
}
$retour_semaine .= "</div>";

// Affichage du résultat
echo $retour_semaine;

?>