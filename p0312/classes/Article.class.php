<?php
class Article {
	private $_description;
	private $_prix;
	
	public function __construct($description, $prix) {
		$this->_description = $description;
		$this->_prix = $prix;
	}
	
	public function detail() {
		return sprintf("%s à %1.2f CHF", $this->_description, $this->_prix);
	}
}
