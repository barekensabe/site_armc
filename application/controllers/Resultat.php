<?php 

/**
 * 
 */
class Resultat extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}


	function index(){

		$rek = $this->Model->getRequete('SELECT projets_reponse.REPONSE_ID,projets_question.Q_ID,projets_lieu.DATE_DEBUT,projets_lieu.DATE_FIN,projets_reponse.REPONSE,pays.PAYS_NOM,ville.NOM_VILLE,commune.COMMUNE_NOM,enqueteur.NOM,enqueteur.POSTNOM,enqueteur.PRENOM,enqueteur.SEXE FROM projets_reponse INNER JOIN projets_question ON projets_question.Q_ID = projets_reponse.QUESTION_ID INNER JOIN projets_lieu ON projets_reponse.LIEU_ID = projets_lieu.LIEU_ID INNER JOIN pays ON pays.PAYS_ID = projets_lieu.PAYS INNER JOIN ville ON ville.VILLE_ID = projets_lieu.VILLE_ID INNER JOIN commune ON commune.COMMUNE_ID = projets_lieu.COMMUNE_ID INNER JOIN enqueteur ON enqueteur.ENQUETEUR_ID = projets_lieu.ENQUETEUR_ID WHERE projets_question.Q_ID = 1');


		$tabele = '<table border=1>
		<tr>
		<td>Code question</td>
		<td>Enqueteur</td>
		<td>Date</td>
		<td>Reponse</td>
		<td>Pays</td>
		<td>Ville</td>
		<td>Commune</td>
		</tr>';
		foreach ($rek as $ke_rek) {
			# code...
		$tabele.='<tr>
		<td>'.$ke_rek['Q_ID'].'</td>
		<td>'.$ke_rek['NOM'].' '.$ke_rek['PRENOM'].' </td>
		<td>'.$ke_rek['DATE_DEBUT'].'</td>
		<td>'.$ke_rek['REPONSE'].'</td>
		<td>'.$ke_rek['PAYS_NOM'].'</td>
		<td>'.$ke_rek['NOM_VILLE'].'</td>
		<td>'.$ke_rek['COMMUNE_NOM'].'</td>

		</tr>';
		}
		$tabele.= '</table>';


		echo $tabele;
	}
}

 ?>