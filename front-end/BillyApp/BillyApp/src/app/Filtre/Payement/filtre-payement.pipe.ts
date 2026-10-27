import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtrePayement',
})
export class FiltrePayementPipe implements PipeTransform {

  transform(value: any[],textRecherche: string , textRechercheAnnee: string, textRechercheClasse: Number, anneEncoursId: string): any[] {


    if(!value) return [];
    if((!textRecherche && !textRechercheAnnee || textRechercheAnnee=='0') && !textRechercheClasse){
      value = value.filter(stati_eleve =>
        stati_eleve.annee_scolaire_id.toString() == anneEncoursId

      );
      return value;
    }


        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          if(!textRechercheAnnee){
            textRechercheAnnee=anneEncoursId.toString();
          }
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(payement =>
            payement.matricule_eleve.toLowerCase().includes(textRecherche)||
            payement.nom_complet_eleve.toLowerCase().includes(textRecherche)||
            payement.nom_classe.toLowerCase().includes(textRecherche)||
            payement.parent_contact.toLowerCase().includes(textRecherche)||
            payement.total_paiement.toString().includes(textRecherche)||
            payement.netResteAPayer.toString().includes(textRecherche)||
            payement.total_reduction.toString().includes(textRecherche)
          );
        }


        if (textRechercheClasse && textRechercheClasse !=0) {
          if(!textRechercheAnnee){
            textRechercheAnnee=anneEncoursId.toString();
          }

          value = value.filter(stati_eleve =>
            stati_eleve.classe_id== textRechercheClasse

          );
        }

    // Filtrage par année scolaire
    if (textRechercheAnnee && textRechercheAnnee !='0') {
      value = value.filter(stati_eleve =>
        stati_eleve.annee_scolaire_id.toString() === textRechercheAnnee

      );
    }else{
      value = value.filter(stati_eleve =>
        stati_eleve.annee_scolaire_id.toString() === anneEncoursId

      );
    }

    return value;
  }

}
