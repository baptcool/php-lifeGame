<?php

require_once "./Organisme.php";

// Un monde est l'univers du jeu de la vie, composé d'organismes constituant une
// matrice qui se met à jour selon les règles de naissance et de mort des organismes
// en fonction de leurs voisins directs



class Monde {
    public $hauteur;
    public $largeur;
    public $tableau;
    private $tableau2;




    // Taille de la matrice constituant le monde
    // La matrice carrée

    // Constructeur d'un monde
    function __construct($hauteur, $largeur) {
        $this->hauteur= $hauteur; 
        $this->largeur= $largeur; 
        
        for ($i=0; $i<$largeur; $i++) {
            for ($j=0; $j<$hauteur; $j++) {
                $this->tableau[$j][$i]= new Organisme((bool)rand(0,1));                       
            }      
        }
    }

    // Affichage d'un monde faisant appel à l'affichage des cellules qui le composent
    function afficher() {
        for ($i=0; $i< $this->hauteur; $i++) {
            for ($j=0; $j<$this->largeur; $j++) {
                echo" ";
                $this->tableau[$i][$j]->afficher();
            }  
            echo "<br/>";
        }
    }
    
    
    // Calcul du nombre de voisins vivants en fonction des coordonnées d'une cellule
  
    
     private function nbVoisinsMooreVivants($x, $y) {
         
        $nbVoisinsVivants=0;
       
        if($y > 0 && $this->tableau[$x][$y-1]->getEtat() == true){           $nbVoisinsVivants++;      }
        if($y+1 < $this->largeur     && $this->tableau[$x][ $y+1]->getEtat() == true){           $nbVoisinsVivants++;      }
        if($x+1< $this->hauteur && $y > 0 && $this->tableau[$x+1][$y-1]->getEtat() == true){$nbVoisinsVivants++;        }
        if($x+1< $this->hauteur    && $this->tableau[$x+1][ $y]->getEtat() == true){               $nbVoisinsVivants++;      }
        if($x+1< $this->hauteur    && $y+1 < $this->largeur && $this->tableau[$x +1][ $y +1]->getEtat() == true){          $nbVoisinsVivants++;     }
        if($x>0 && $y+1 <$this->largeur && $this->tableau[$x-1][ $y+1]->getEtat() == true){           $nbVoisinsVivants++;        }
        if($x >0 && $this->tableau[$x-1][$y]->getEtat() == true){            $nbVoisinsVivants++;        }   
        if($x >0 && $y > 0 && $this->tableau[$x-1][$y-1]->getEtat() == true){            $nbVoisinsVivants++;        }
         echo "<br/>";
        
        return $nbVoisinsVivants;
    }
   
    // Application des règles du jeu de la vie en fonction des coordonnées d'une cellule,
    // avec "true" pour vivant ou "false" pour mort comme valeurs de retour possibles
    private function prochainEtat($y, $x, $nbVoisinsVivants) {
        if( $this->tableau[$y][$x]->getEtat() == true ){
           if($nbVoisinsVivants == 3 || $nbVoisinsVivants == 2 ){
                 return true;
            } 
            else{
                return false;
            }
        }else{
            if($nbVoisinsVivants == 3 ){
                return true;
            }
            else{
                return false;
                
            }
        }
    }

    // Gestion d'un tour du jeu de la vie où tous les organismes sont mis à jour en
    // fonction de l'état de leurs voisins
    function tourSuivant() {
        for ($i=0; $i< $this->hauteur; $i++) {
            for ($j=0; $j< $this->largeur; $j++) {
                $temp = $this->nbVoisinsMooreVivants($i, $j);
                if($this->prochainEtat($i, $j, $temp ) == true){
                    $this->tableau2[$i][$j]= new Organisme(true);   
                }
                else {
                    $this->tableau2[$i][$j]= new Organisme(false);   
                }
                
            }
        }
        //$this->copier();
       
        $this->tableau = $this->tableau2;
    }
   
  
    
    
    
    
    
    
}
