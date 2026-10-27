<?php



namespace App\ClassesTransfereData;

class ActionsEleves{
    public $id;
    public $evenement;
    public $tranche;
    public $montant;
    public $date;
    public $id_eleve;
    public $classe;
    public $anneeScolaire;
    public $moyenPayement;
    public $nomComplet;

    public function __construct($id, $evenement, $tranche, $montant, $date, $id_eleve, $classe, $anneeScolaire, $moyenPayement,$nomComplet){
        $this->id = $id;
        $this->evenement = $evenement;
        $this->tranche = $tranche;
        $this->montant = $montant;
        $this->date = $date;
        $this->id_eleve = $id_eleve;
        $this->classe = $classe;
        $this->anneeScolaire = $anneeScolaire;
        $this->moyenPayement = $moyenPayement;
        $this->nomComplet = $nomComplet;
    }

}