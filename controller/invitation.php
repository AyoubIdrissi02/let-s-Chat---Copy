<?php
namespace Chat;
use Chat\Utilisateur;
use Connect;
/**
 * @access public
 * @author Ayoub IDRISSI
 * @package Chat
 */
class Invitation {
	/**
	 * le ID du recepteur
	/**
	 * l ID de l'expiditeur
	 */
	/**
	 * la date actuelle d'envoi d'invitation
	 */
	 /* l'etat d'invitation peut etre :
	 * -en cours : si l'invitation est envoyer mais n'est pas accepter
	 * -accepter; en cas ou l'invitation  est accepter
	 */
	/**
	 * @AssociationType Chat\Utilisateur
	 * @AssociationMultiplicity 0..*
	 */
	public $envoyer = array();

	/**
	 * @access public
	 */

	/**
	 * @access public
	 * @param cExpiditeurID
	 * @param cRecepteurID
	 */
	public function envoyerInvitation($cExpiditeurID, $cRecepteurID) {
		$connect = new Connect();
		$date = date("Y-m-d");
		$connect -> put("INSERT INTO `invitation`( `sender`, `reciver`, `etat`, `date`) VALUES ('$cExpiditeurID','$cRecepteurID','requested','$date')");
	}

	/**
	 * @access public
	 * @param cExpiditeurID
	 * @param cRecepteurID
	 */
	public function AccepterInvitaion($cIdInvitation) {
		$connect = new Connect();
		$connect->put("UPDATE `invitation` SET `etat`='accepted' WHERE IDinvitation='$cIdInvitation'");
	}

	/**
	 * @access public
	 * @param cExpiditeurID
	 * @param cRecepteurID
	 */
	public function refuserInvitation($cIdInvitation) {
		$connect = new Connect();
		$connect->put("DELETE FROM `invitation` WHERE IDinvitation='$cIdInvitation'");
	}

	/**
	 * @access public
	 * @param cRecepteurID
	 */
	public function allInvitation($cRecepteurID) {
		$connect = new Connect();
		return $connect->getAll("SELECT * FROM invitation join user on user.IDutilisateur = invitation.sender where reciver = '$cRecepteurID' and etat = 'requested'");
	}
	
	public function mesInvitation($cSender) {
		$connect = new Connect();
		return $connect->getAll("SELECT * FROM invitation  where sender = '$cSender' or reciver = '$cSender' ");
	}

	public function otherInvitation($cReciver) {
		$connect = new Connect();
		return $connect->getAll("SELECT * FROM invitation  where reciver = '$cReciver' ");
	}

	/**
	 * @access public
	 * @param cRecepteurID
	 * @param cExpiditeurID
	 */
	
}
?>