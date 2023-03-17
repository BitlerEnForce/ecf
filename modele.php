<?php

class carteMenu {
    public $img;
    public $titre;
    public $prix;
    
    public function __construct($img, $titre, $prix) {
      $this->img = $img;
      $this->titre = $titre;
      $this->prix = $prix;
    }
    
    public function creationCarte() {
      echo "<div class='carte'>
                <div class='image' style='background-image: url(\"{$this->img}\");'></div>
                <div class='description'>
                    <p>\"{$this->titre}\"</p>
                    <p>\"{$this->prix}\"</p>
                </div>
            </div>";
    }
  }

?>