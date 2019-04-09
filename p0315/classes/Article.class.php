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
	public function rowDetail() {
		return sprintf("<tr><td>%s</td><td>%1.2f CHF</td></tr>", $this->_description, $this->_prix);
	}
}
