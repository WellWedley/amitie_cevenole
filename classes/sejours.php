<?php
class Sejours
{
    private $id;
    private $nom;
    private $dateDebut;
    private $decompte;
    private $dateFin;
    private $lieu;

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    public function getDecompte()
    {
        return $this->decompte;
    }
    public function getDateFin()
    {
        return $this->dateFin;
    }
    public function getLieu()
    {
        return $this->lieu;
    }

    // Constructor
    function __construct($id, $nom, $dateDebut,$decompte,$dateFin,$lieu)
    {
        
    }
    public function setId($val)
    {
        $this->id = $val;
    }
    public function setNom($val)
    {
        $this->nom = $val;
    }
    public function setDateDebut($val)
    {
        $this->date_debut = $val;
    }
    public function setDecompte($val)
    {
        $this->decompte = $val;
    }
    public function setDateFin($val)
    {
        $this->date_fin = $val;
    }
    public function setLieu($val)
    {
        $this->lieu = $val;
    }

    // Autres fonctions de la classe 

}
