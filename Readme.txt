Ce plugin permet de laisser un ou plusieurs commentaires sur une fiche produit.

Une boucle permet de lister les commentaires déposés.

Paramètre d'entrée de la boucle : 
- id

paramètres de sortie de la boucle : 
- #ID id du commentaire en base
- #TITRE titre du commenaitre
- #MESSAGE message du commentaire

exemple de boucle, nous nous situons dans une boucle produit : 
<ul>
<THELIA_COM type="COMMENTAIRE" id="#ID">
    <li>#TITRE : #MESSAGE</li>
</THELIA_COM>
</ul>

Ce plugin est sous licence GPL V3