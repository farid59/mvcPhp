<?php $titre = "Ajout d'un contact"; ?>

<?php ob_start(); ?>

<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form action="" method="POST">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required value=<?= $contact->getNom() ?> >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required value=<?= $contact->getPrenom() ?> >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="societe" name="societe" placeholder="Societe" value=<?= $contact->getSociete() ? $contact->getSociete() : "" ?> >
                    </div>                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" value=<?= $contact->getAdresse() ?>  >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Numero de mobile" value=<?= $contact->getNum() ?>  >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value=<?= $contact->getEmail() ?> >
                        <?php if(isset($err)) echo "<i style='color:red' >Adresse mail invalide</i>"; else echo "";  ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="siteweb" name="siteweb" placeholder="Site internet" value=<?= $contact->getSite() ?> >
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="statut" id="particulier" value="Particulier" checked>
                        Particulier
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="statut" id="professionnel" value="Professionnel">
                        Professionnel
                      </label>
                    </div>
        <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">
            <?= !isset($_GET['id']) ? "Créer le contact" : "Modifier le contact" ?>
        </button>

        </form>
    </div>
</div>
</div>


<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>