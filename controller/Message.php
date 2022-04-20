<?php
namespace Chat;



use Chat\Utilisateur;
use Connect;

/**
 * @access public
 * @author Ayoub IDRISSI
 * @package Chat
 */
class Message {
	/**
	 * @AssociationType Chat\Utilisateur
	 * @AssociationMultiplicity 0..*
	 */

	/**
	 * @access public
	 */
	public function __construct()
	{
		// un constructeur vide 
	}

	/**
	 * @access public
	 * @param cContent
	 * @param cMrecepteur
	 * @param cMexpiditeur
	 */
	public function envoyermessage($cContent, $cMrecepteur, $cMexpiditeur) {
		$connect = new Connect();
		$date = date("Y-m-d");
		$connect->put("INSERT INTO `message`( `senderM`, `reciverM`, `dateM`, `content`) VALUES ('$cMexpiditeur','$cMrecepteur','$date','$cContent')");
	}

	/**
	 * @access public
	 * @param cMrecepteur
	 */
	public function mesMessage($cMrecepteur) {
		$connect = new Connect();
		return $connect->getAll("SELECT * FROM message where senderM= '$cMrecepteur' or reciverM = '$cMrecepteur'");
	}
}
?>