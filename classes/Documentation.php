<?php 


class Documentation
{
	public static function getDocumentByProject($id_projet)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM documentation dcs join users u on dcs.id_user=u.id_user WHERE dcs.id_projet = :id_projet and dcs.deleted = 0 ");
		$query->bindValue(':id_projet', $id_projet);
		$query->execute();
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
	public function add($id_projet, $lien, $filename, $id_user, $deleted)
	{
		global $conn;
		$query = $conn->prepare("INSERT INTO documentation (id_projet, lien, filename, id_user, deleted) 
			VALUES (:id_projet, :lien, :filename, :id_user, :deleted)");
		$query->bindValue(':id_projet', $id_projet);
		$query->bindValue(':lien', $lien);
		$query->bindValue(':filename', $filename);
   		$query->bindValue(':id_user', $id_user);
   		$query->bindValue(':deleted', $deleted);
		if($query->execute())
			return true;
		else
			return false;
	}
	public function delete($id_docs)
	{
		global $conn;
		$query = "UPDATE documentation SET deleted = 1 WHERE id_docs = $id_docs";
		if ($conn->exec($query))
			return true;
		else
			return false;
	}
	public static function download($id_docs)
	{
		global $conn;
		$query = $conn->prepare("SELECT * FROM documentation WHERE id_docs = :id_docs");
		$query->bindValue(':id_docs', $id_docs);
		$query->execute();
    	$resultat = $query->fetch();
    	$folder = basename(__DIR__).'/../uploads/docs/'.$resultat['lien'];

    	//$ext = substr($resultat['lien'], -4);
    	$ext=substr($resultat['lien'],strrpos($resultat['lien'],'.')+1);
		$ext=strtolower($ext);
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . $resultat['filename'].'.'.$ext. "\""); 
		echo readfile($folder);
    	return true;
	}
}
?>
