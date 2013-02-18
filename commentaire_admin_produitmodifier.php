<?php
require_once(__DIR__ . '/../../../fonctions/authplugins.php');
autorisation("commentaire");

$produit = new Produit(lireParam("ref", "string"));

$query= "SELECT * FROM ".Commentaire::TABLE." WHERE produit_id=".$produit->id;

$liste = $produit->query_liste($query);
?>
<div class="entete">
	<div class="titre">GESTION DE(S) COMMENTAIRE(S)</div>
	<div class="fonction_valider"><a href="#" onclick="envoyer();">VALIDER LES MODIFICATIONS</a></div>
</div>
<div>
    <table width="100%" cellpadding="5" cellspacing="0">
        <tr class="fonce">
            <td class="designation">Titre</td>
            <td><input type="text" name="commentaire_titre" class="form_long"/></td>
        </tr>
        <tr class="claire">
            <td class="designation">Message</td>
            <td><textarea name="commentaire_message" rows="5" cols="20" style="width:100%;"></textarea></td>
        </tr>
    </table>
    <div class="blocs_pliants_prod" id="pliantdeclinaisons">
    <ul class="ligne1">
        <li class="cellule" style="width:100px;">Titre</li>
        <li class="cellule" style="width:390px;">Message</li>
        <li class="cellule" style="width:50px;">Actif</li>
    </ul>
        <?php foreach($liste as $commentaire): ?>
        <ul class="lignesimple">
            <li class="cellule" style="width:100px; padding: 5px 0 0 5px;"><?php echo($commentaire->titre); ?></li>
            <li class="cellule_prix" style=" width: 390px; padding: 5px 0 0 5px;"><?php echo $commentaire->message; ?></li>
            <li class="cellule_prix">
                <?php if($commentaire->actif): ?>
                    <a href="#">désactiver</a>
                <?php else: ?>
                    <a href="#">activer</a>
                <?php endif; ?>
            </li>
        </ul>
        <?php endforeach; ?>
    </div>
</div>





