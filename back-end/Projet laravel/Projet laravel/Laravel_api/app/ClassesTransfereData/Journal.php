<?php



namespace App\ClassesTransfereData;

class Journal{
    public $id;
    public $evenement;
    public $montant;
    public $date;
    public $updated_at;
    public $compte_id;
    public $nomCompte;
    public $type;
    public $numeroCompte;

    public function __construct($id, $evenement, $montant, $date, $compte_id, $nomCompte,$type,$updated_at,$numeroCompte){
        $this->id = $id;
        $this->evenement = $evenement;
        $this->montant = $montant;
        $this->date = $date;
        $this->nomCompte = $nomCompte;
        $this->compte_id = $compte_id;
        $this->type = $type;
        $this->updated_at = $updated_at;
        $this->numeroCompte = $numeroCompte;
    }

}