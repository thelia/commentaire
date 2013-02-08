<?php

class Commentaire extends PluginsClassiques
{
    
    public $id;
    public $titre;
    public $message;
    public $actif;
    public $produit_id;
    
    public $bddvars = array("id", "titre", "message", "actif", "produit_id");
    public $table = "commentaire";
    
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
}