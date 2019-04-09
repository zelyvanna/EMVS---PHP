<?php
class Catalogue {
	private $_articles;
	
	public function __construct() {
		$this->_articles = array();
	}
	
	public function addArticle($descriptif, $prix) {
		$this->_articles[] = new Article($descriptif, $prix);
	}
	public function removeArticle($id) {
		unset($this->_articles[$id]);
	}
	public function detail() {
		$retour = "<table>";
		foreach($this->_articles as $id => $article) {
			$retour .= sprintf("<tr><td>%s</td><td><a href=\"?action=removeArticle&id=%d\">Supprimer</a></td></tr>",
				$article->detail(), $id);
		}
		$retour .= "</table>";
		return $retour;
	}
}