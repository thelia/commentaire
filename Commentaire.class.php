<?php
/*************************************************************************************/
/*                                                                                   */
/*      Thelia	                                                                     */
/*                                                                                   */
/*      Copyright (c) 2005-2013 OpenStudio                                           */
/*      email : info@thelia.fr                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 3 of the License                */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*      along with this program.  If not, see <http://www.gnu.org/licenses/>.        */
/*                                                                                   */
/*************************************************************************************/
class Commentaire extends PluginsClassiques
{
    
    public $id;
    public $titre;
    public $message;
    public $actif;
    public $produit_id;
    
    public $bddvars = array("id", "titre", "message", "actif", "produit_id");
    public $table = self::TABLE;
    const TABLE = "commentaire";
    
    /**
     * Constructeur de la class. Non essentielle mais permet de fixer le nom du
     * plugin si le fichier plugin.xml est absent.
     */
    public function __construct()
    {
        parent::__construct("commentaire");
    }
    
    /**
     * méthode init, exécuté lors de l'activation du plugin.
     * 
     * Permet d'automatiser certaines tâches lors de l'activation du plugin.
     */
    public function init()
    {
        $query = "CREATE  TABLE IF NOT EXISTS`commentaire` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titre` VARCHAR(255) NULL ,
  `message` TEXT NULL ,
  `actif` INT NULL ,
  `produit_id` INT NULL ,
  PRIMARY KEY (`id`) );";
        
        $this->query($query, true);
    }
    
    public function modprod(Produit $produit)
    {
        
        $titre = trim(lireParam("commentaire_titre", "string"));
        $message = trim(lireParam("commentaire_message", "string"));
        
        
        if ( empty($titre) === false && empty($message) === false) {
            $commentaire = new Commentaire();
            $commentaire->titre = $titre;
            $commentaire->message = $message;
            $commentaire->produit_id = $produit->id;
                        
            $commentaire->add();
        }
    }
    
    public function boucle($texte, $args)
    {
        $id = lireTag($args, "id", "int");
        
        if(empty($id)) return;
        
        $return = "";
        
        $query = "SELECT id, titre, message FROM ".$this->table." WHERE actif=1 AND produit_id=".$id;
        
        foreach ($this->query_liste($query) as $result) {
            $temp = str_replace("#ID", $result->id, $texte);
            $temp = str_replace("#TITRE", $result->titre, $temp);
            $temp = str_replace("#MESSAGE", $result->message, $temp);
            
            $return .= $temp;
        }
        
        return $return;
    }
}