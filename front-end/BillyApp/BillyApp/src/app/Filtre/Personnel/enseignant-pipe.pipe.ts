import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'enseignantPipe',
  standalone: true
})
export class EnseignantPipePipe implements PipeTransform {

  transform(value: any[], textRecherche: string,  textRechercheAnnee: string,  anneEncoursId: string, textRechercheMois: string, moisEncours: string): any[] {


    if(!value) return [];
    if(!textRecherche && (!textRechercheAnnee || textRechercheAnnee=='0')  && !textRechercheMois){
      value = value.filter(salaireEnsenseignant =>
        salaireEnsenseignant.annee_scolaire_id.toString() == anneEncoursId

      );

      value = value.filter(salaireEns =>
        salaireEns.mois.toLowerCase() == moisEncours.toLowerCase()
      );
      return value;
    }
    value = value.filter(salaireEns =>
      salaireEns.disponibilite.toLowerCase() == "oui"
    );


        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(enseignant =>
            enseignant.matricule?.toLowerCase().includes(textRecherche)||
            enseignant.nomPrenom?.toLowerCase().includes(textRecherche)||
            enseignant.tel_personnel?.toLowerCase().includes(textRecherche)||
            enseignant.mail_personnel?.toLowerCase().includes(textRecherche)||
            enseignant.fonction?.toLowerCase().includes(textRecherche)||
            enseignant.adresse_personnel.toLowerCase().includes(textRecherche)
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
      }else{

        value = value.filter(salaireRes =>
          salaireRes.mois.toLowerCase() == moisEncours.toLowerCase()
        );
      }

       // Filtrage par année scolaire
       if (textRechercheAnnee && textRechercheAnnee !='0') {
        value = value.filter(salaireRes =>
          salaireRes.annee_scolaire_id.toString() === textRechercheAnnee

        );
      }else{
        value = value.filter(salaireRes =>
          salaireRes.annee_scolaire_id.toString() === anneEncoursId

        );
      }

    return value;
  }

}
