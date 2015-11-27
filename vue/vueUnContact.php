<?php $titre = "Info sur ".$contact->getNom(); ?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><?= $contact->getNom() ?></h4>
                        <small><cite title="San Francisco, USA"><?= $contact->getAdresse() ?> <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?= $contact->getEmail() ?>
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com"><?= $contact->getSite(); ?></a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i><?= $contact->getDate()->format('Y-m-d H:i:s') ?></p>
                        <!-- Split button -->
                        <a href="?action=delete&id=<?= $contact->getId()?>">Supprimer</a></br>
                        <a href="?action=update&id=<?= $contact->getId()?>">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>