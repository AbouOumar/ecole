<?php



namespace App\ClassesTransfereData;

class ParentPersonnels{
    public $id;
    public $nom_parent;
    public $prenom_parent;
    public $telephone_parent;
    public $Email_parent;
    public $nbre_enfant;
    public $adresse_parent;
    public $profession;
    public $create_date;
    public $type;

    public function __construct($id, $nom_parent, $prenom_parent, $telephone_parent, $nbre_enfant, $adresse_parent, $profession,$create_date,$type,$Email_parent){
        $this->id=$id;
        $this->nom_parent=$nom_parent;
        $this->prenom_parent=$prenom_parent;
        $this->telephone_parent=$telephone_parent;
        $this->nbre_enfant=$nbre_enfant;
        $this->adresse_parent=$adresse_parent;
        $this->profession=$profession;
        $this->create_date=$create_date;
        $this->type=$type;
        $this->Email_parent=$Email_parent;
    }

}