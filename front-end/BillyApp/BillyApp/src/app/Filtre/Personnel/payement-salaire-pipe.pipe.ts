import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'payementSalairePipe',
})
export class PayementSalairePipePipe implements PipeTransform {

  transform(value: any[], textRecherche: string,  textRechercheAnnee: string,  anneEncoursId: string, textRechercheMois: string): any[] {


    if(!value) return [];
    if(!textRecherche && (!textRechercheAnnee || textRechercheAnnee=='0')  && !textRechercheMois){
      value = value.filter(payementSalaire =>
        payementSalaire?.salaire?.annee_scolaire_id.toString() == anneEncoursId
      );
      return value;
    }


        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(payementSalaire =>
            payementSalaire?.salaire?.personnel?.matricule_personnel?.toLowerCase().includes(textRecherche)||
            payementSalaire?.salaire?.personnel?.nom_personnel?.toLowerCase().includes(textRecherche)||
            payementSalaire?.salaire?.personnel?.prenom_personnel?.toLowerCase().includes(textRecherche)||
            payementSalaire?.salaire?.mois?.toLowerCase().includes(textRecherche)||
            payementSalaire?.compte?.nomCompte?.toLowerCase().includes(textRecherche)
          );
        }


          // Filtrage par Mois
      if (textRechercheMois) {
        if(!textRechercheAnnee){
          textRechercheAnnee=anneEncoursId.toString();
        }
        value = value.filter(payementSalaire =>
          payementSalaire?.salaire?.mois.toLowerCase()== textRechercheMois.toLowerCase()

        );
      }

       // Filtrage par année scolaire
       if (textRechercheAnnee && textRechercheAnnee !='0') {
        value = value.filter(payementSalaire =>
          payementSalaire?.salaire?.annee_scolaire_id.toString() === textRechercheAnnee

        );
      }

    return value;
  }

}
