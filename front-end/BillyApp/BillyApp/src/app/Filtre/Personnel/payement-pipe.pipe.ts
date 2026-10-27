import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'payementPipe',
})
export class PayementPipePipe implements PipeTransform {

  transform(value: any[], textRecherche: string,   textRechercheClasse: string): any[] {


    if(!value) return [];
    if(!textRecherche && !textRechercheClasse){
      return value;
    }

      // Filtrage par texte (nom, prénom, matricule)
      if (textRecherche) {
        textRecherche=textRecherche.toLowerCase();
        value = value.filter(paiement =>
          paiement.eleve.matricule_eleve?.toLowerCase().includes(textRecherche)||
          paiement.eleve.nom_eleve?.toLowerCase().includes(textRecherche)||
          paiement.eleve.prenom_eleve?.toLowerCase().includes(textRecherche)||
          paiement.classe.nom_classe?.toLowerCase().includes(textRecherche)||
          paiement.compte.nomCompte?.toLowerCase().includes(textRecherche)||
          paiement.updated_at?.toLowerCase().includes(textRecherche)||
          paiement.tranche?.toLowerCase().includes(textRecherche)
        );
      }


          // Filtrage par compte
      if (textRechercheClasse) {
        value = value.filter(paiement =>
          paiement.classe.nom_classe== textRechercheClasse
        );
      }

    return value;
  }

}
