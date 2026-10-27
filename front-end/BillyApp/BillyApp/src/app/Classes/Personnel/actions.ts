export class Actions {
    id!:number
    personnel_id: number|undefined;
    annee_scolaire_id: number;
    compte_id: number;
    type: string;
    mois: string;
    fonction: string;
    montant: number;
    id_action_ecolage: number=0
  
    constructor(
      personnel_id: number,
      mois: string,
      annee_scolaire_id: number,
      compte_id: number,
      type: string,
      fonction: string,
      montant: number,
    ){
      this.personnel_id=personnel_id;
      this.compte_id=compte_id;
      this.annee_scolaire_id=annee_scolaire_id;
      this.type=type;
      this.fonction=fonction;
      this.montant=montant;
      this.mois=mois;
    }
}
