<?php
require_once(__DIR__ . '/../../../fonctions/authplugins.php');
autorisation("commentaire");

$produit = new Produit(lireParam("ref", "string"));
?>
<div class="entete">
	<div class="titre">GESTION DE(S) COMMENTAIRE(S)</div>
	<div class="fonction_valider"><a href="#" onclick="envoyer();">VALIDER LES MODIFICATIONS</a></div>
</div>
<div>
    <table width="100%" cellpadding="5" cellspacing="0">
        <tr class="claire">
            <td class="designation">Message</td>
            <td><textarea name="commentaire_message" rows="5" cols="20" style="width:100%;"></textarea></td>
        </tr>
    </table>
</div>





