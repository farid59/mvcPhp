<?php $titre = "Projet Php - Carnet d'adresses"; ?>

<?php ob_start(); ?>
<table class='table table-striped'>
<?php foreach($contacts as $contact)
	echo "".
		"<tr>".
		"<td>".$contact['nom']."</td>".
		"<td>".$contact['prenom']."</td>".
		"<td>".$contact['societe']."</td>".
		"<td>".$contact['adresse']."</td>".
		"<td>".$contact['numero']."</td>".
		"<td>".$contact['email']."</td>".
		"<td>".$contact['site']."</td>".
		"<td>".$contact['statut']."</td>".
		"<td><a href='?action=delete&id=".$contact['id']."'>Supprimer</a></td>".
		"<td><a href='?action=update&id=".$contact['id']."'>Modifier</a></td>".
		"</tr>";
?>
</table>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>