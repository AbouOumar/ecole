import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreRecetteCasReducton',
})
export class FiltreRecetteCasReductonPipe implements PipeTransform {

  transform(value: any[],  textRechercheAnnee: string,  textRechercheMois: string): any[] {
    if(!value) return [];
    if((!textRechercheAnnee || textRechercheAnnee=='0')  && !textRechercheMois){
      value = value.filter(recetteCasReductionListe =>
        recetteCasReductionListe.annee_scolaire_id.toString() == textRechercheAnnee

      );

      value = value.filter(recetteCasReductionListe =>
        recetteCasReductionListe.mois.toLowerCase() == textRechercheMois.toLowerCase()
      );
      return value;
    }

            // Filtrage par Mois
        if (textRechercheMois) {
          value = value.filter(recetteCasReductionListe =>
            recetteCasReductionListe.mois.toLowerCase()== textRechercheMois.toLowerCase()

          );
        }else{

          value = value.filter(recetteCasReductionListe =>
            recetteCasReductionListe.mois.toLowerCase() == textRechercheMois.toLowerCase()
          );
        }
            // Filtrage par année scolaire
            if (textRechercheAnnee && textRechercheAnnee !='0') {
              value = value.filter(recetteCasReductionListe =>
                recetteCasReductionListe.annee_scolaire_id.toString() === textRechercheAnnee

              );
            }else{
              value = value.filter(recetteCasReductionListe =>
                recetteCasReductionListe.annee_scolaire_id.toString() === textRechercheAnnee

              );
            }

        return value;
  }

}
