<?php

// Un organisme est un élément atomique du jeu de la vie, et il peut être vivant
// ou mort (propriété)
class Organisme {
    private $Etat;
    // Accesseur en lecture de la propriété de vie ou de mort (remplacer XXX par le nom de cette propriété)
    function getEtat() {
        return $this->Etat;
    }
    
    // Constructeur d'un organisme
    function __construct($vivant) {
        if($vivant){
            $this->Etat = true;
        }
        else{
            $this->Etat = false;
        }
        
    }
    // Affichage d'un organisme ("O" si vivant, espace si mort)
    function afficher() {
        
        if($this->getEtat()){
            echo "0";
        }else{
           
            echo "&nbsp";
        }
        
    }

}
