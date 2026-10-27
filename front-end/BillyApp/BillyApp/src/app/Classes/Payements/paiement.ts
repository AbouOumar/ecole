export class Paiement {
  eleve_id: number;
  classe_id: number;
  annee_scolaire_id: number;
  compte_id: number;
  tranche: string;
  montant_payement: number;
  id_action_ecolage: number=0


  constructor(
    eleve_id: number,
    classe_id: number,
    annee_scolaire_id: number,
    compte_id: number,
    tranche: string,
    montant_payement: number,
  ){
    this.eleve_id=eleve_id;
    this.classe_id=classe_id;
    this.annee_scolaire_id=annee_scolaire_id;
    this.compte_id=compte_id;
    this.tranche=tranche;
    this.montant_payement=montant_payement;
  }
}
