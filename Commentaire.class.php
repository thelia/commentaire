<?php

class Commentaire extends PluginsClassiques
{
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
        
        $this->query($query);
    }
}