<?php
class Catalogue {
	private $_articles;
	
	function __construct() {
		$this->_articles = array();
	}
	
	function printForm($id=-1) {
		if($id == -1) {
			$action = "Ajouter";
			$description = "";
			$prix = "";
		} else {
			$action = "Modifier";
			$description = $this->_articles[$id]->getDescription();
			$prix = $this->_articles[$id]->getPrix();
		}
?>
<form action="#" method="POST">
	<input type="hidden" name="action" value="form_<?php echo $action; ?>" />
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<p>
		<label for="description">Description</label>
		<input type="text" name="description" id="description" value="<?php echo $description; ?>"/>
	</p>
	<p>
		<label for="prix">Prix</label>
		<input type="text" name="prix" id="prix" value="<?php echo $prix; ?>"/>
	</p>
	<p><input type="submit" value="<?php echo $action; ?> l'article" />
</form>
<?php		
	}
	
	function addArticle($description, $prix) {
		$msg = Article::checkFields($description, $prix);
		if(is_null($msg)) {
			$this->_articles[] = new Article($description, $prix);
			echo "Article ajouté au catalogue<br/>";
		} else {
			echo $msg."<br/>";
		}
	}
	function updateArticle($id, $description, $prix) {
		$msg = Article::checkFields($description, $prix);
		if(is_null($msg)) {
			$this->_articles[$id] = new Article($description, $prix);
			echo "Article mis à jour dans le catalogue<br/>";
		} else {
			echo $msg."<br/>";
		}
	}
	function removeArticle($id) {
		unset($this->_articles[$id]);
	}
	function detail() {
		$result = "<table>";
		foreach($this->_articles as $id => $article) {
			$result .= "<tr><td>".$article->detail().'</td>'.
				'<td><a href="?action=updateArticle&id='.$id.'">modifier</a></td>'.
				'<td><a href="?action=removeArticle&id='.$id.'">supprimer</a></td>'.
				'</tr>';
		}
		$result .= "</table>";
		return $result;
	}
}
