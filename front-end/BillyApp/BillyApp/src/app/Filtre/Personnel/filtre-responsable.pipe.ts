import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreResponsable',

})
export class FiltreResponsablePipe implements PipeTransform {


  transform(value: any[], textRecherche: string,  textRechercheAnnee: string,  anneEncoursId: string, textRechercheMois: string, moisEncours: string): any[] {


    if(!value) return [];
    if(!textRecherche && (!textRechercheAnnee || textRechercheAnnee=='0')  && !textRechercheMois){
      value = value.filter(salaireRes =>
        salaireRes.annee_scolaire_id.toString() == anneEncoursId

      );

      value = value.filter(salaireRes =>
        salaireRes.mois.toLowerCase() == moisEncours.toLowerCase()
      );
      return value;
    }
    value = value.filter(salaireRes =>
      salaireRes.disponibilite.toLowerCase() == "oui"
    );


        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(personnel =>
            personnel.matricule?.toLowerCase().includes(textRecherche)||
            personnel.nomPrenom?.toLowerCase().includes(textRecherche)||
            personnel.tel_personnel?.toLowerCase().includes(textRecherche)||
            personnel.mail_personnel?.toLowerCase().includes(textRecherche)||
            personnel.fonction?.toLowerCase().includes(textRecherche)||
            personnel.adresse_personnel.toLowerCase().includes(textRecherche)
          );
        }


          // Filtrage par Mois
      if (textRechercheMois) {
        if(!textRechercheAnnee){
          textRechercheAnnee=anneEncoursId.toString();
        }
        value = value.filter(salaireRes =>
          salaireRes.mois.toLowerCase()== textRechercheMois.toLowerCase()

        );
      }

       // Filtrage par année scolaire
       if (textRechercheAnnee && textRechercheAnnee !='0') {
        value = value.filter(salaireRes =>
          salaireRes.annee_scolaire_id.toString() === textRechercheAnnee

        );
      }

    return value;
  }

}


