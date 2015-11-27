<div class="container">
<div class="col-md-5">
    <div class="form-area">  
        <form role="form">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="societe" name="societe" placeholder="Societe" required>
                    </div>                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Numero de mobile" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="siteweb" name="siteweb" placeholder="Site internet" required>
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
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                    </div>
            
        <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Créer le contact</button>
        </form>
    </div>
</div>
</div>
