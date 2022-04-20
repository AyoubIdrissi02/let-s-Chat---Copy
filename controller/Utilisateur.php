<?php
namespace Chat;

@session_start();

use Connect;

include "model/connectiondb.php";




use Chat\Message;

/**
 * @access public
 * @author Ayoub IDRISSI
 * @package Chat
 */
class Utilisateur {
	/**
	 * @AssociationType Chat\Message
	 * @AssociationMultiplicity 1
	 */

	/**
	 * @access public
	 */
	public function __construct()
	{
		//constucteur vide
	}

	/**
	 * @access public
	 * @param cEmail
	 * @param cPassword
	 */
	public function creeUtilisateur($cEmail, $cPassword) {
		$connect = new Connect();
		if(!$connect->emailInUse($cEmail)){
			header("location:error");
		}else{
			$user = new Utilisateur();
			$pic = $user->randomImage();
			$connect->put("INSERT INTO `user`( `email`, `password`, `image`) VALUES ('$cEmail','$cPassword','$pic')");
			header("location:/let's%20Chat");
		}
	}	

	/**
	 * @access public
	 * @param cKey
	 */
	public function trouverUtilisateur($cKey,$cId) {
		$connect = new Connect();
		return $connect -> getAll("select * from user where email like '$cKey%' and IDutilisateur != $cId ");
	}

	/**
	 * @access public
	 */
	public function randomImage() {
		$files = glob('images/*.*');
    	$file = array_rand($files);
    	return $files[$file];
	}

	/**
	 * @access public
	 * @param cEmail
	 * @param cPassword
	 */
	public function login($cEmail, $cPassword) {
		$connect = new Connect();
		$count = $connect->count($cEmail,$cPassword) ;
		if ( $count  ==  0 ){
			header("location:errorlocation");
		}else{
			$_SESSION['email'] = $cEmail;
			$_SESSION['image'] = $connect->getImage($cEmail);
			$_SESSION['id'] = $connect->getID($cEmail);
			header("location:home");
		}

	}
}
?>