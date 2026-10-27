import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'statistiqueRapproche',
})
export class StatistiqueRapprochePipe implements PipeTransform {

  transform(value: any[],  textRechercheAnnee: string, textRechercheClasse: Number, anneEncoursId: string, textRechercheMois: string, moisEncours: string,cas: number): any[] {
    if(!value) return [];
    if((!textRechercheAnnee || textRechercheAnnee=='0') && !textRechercheClasse && !textRechercheMois){
      value = value.filter(stati_eleve =>
        stati_eleve.annee_scolaire_id.toString() == anneEncoursId

      );
      if(cas == 1){
        value = value.filter(stati_eleve =>
          stati_eleve.mois.toLowerCase() == moisEncours.toLowerCase()
        );
      }

      return value;
    }

            // Filtrage par Mois
        if (textRechercheMois) {
          if(!textRechercheAnnee){
            textRechercheAnnee=anneEncoursId.toString();
          }
          value = value.filter(stati_eleve =>
            stati_eleve.mois.toLowerCase()== textRechercheMois.toLowerCase()

          );
        }else{

          value = value.filter(stati_eleve =>
            stati_eleve.mois.toLowerCase() == moisEncours.toLowerCase()
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
