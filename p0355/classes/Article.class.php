<?php
class Article {
	private $_description;
	private $_prix;
	
	public function __construct($description, $prix) {
		$this->_description = $description;
		$this->_prix = $prix;
	}
	public function getDescription() {
		return $this->_description;
	}
	public function getPrix() {
		return $this->_prix;
	}
	public function detail() {
		return sprintf("%s à %1.2f CHF", $this->_description, $this->_prix);
	}
	public function rowDetail() {
		return sprintf("<tr><td>%s</td><td>%1.2f CHF</td></tr>", $this->_description, $this->_prix);
	}
	public static function checkFields($description, $prix) {
		if(empty($description)) return "Le descriptif ne peut pas être vide";
		if(!is_numeric($prix)) return "Le prix doit être un nombre";
		return NULL;
	}
}
