import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreSituationPreDepense',
})
export class FiltreSituationPreDepensePipe implements PipeTransform {

  transform(value: any[],  anneeFiltreSP: string,  textRechercheMois: string): any[] {
    if(!value) return [];
    if((!anneeFiltreSP || anneeFiltreSP=='0')  && !textRechercheMois){
      value = value.filter(detailMoisR =>
        detailMoisR.annee_scolaire_id.toString() == anneeFiltreSP

      );

      value = value.filter(detailMoisR =>
        detailMoisR.mois.toLowerCase() == textRechercheMois.toLowerCase()
      );
      return value;
    }

            // Filtrage par Mois
        if (textRechercheMois) {
          value = value.filter(detailMoisR =>
            detailMoisR.mois.toLowerCase()== textRechercheMois.toLowerCase()

          );
        }else{

          value = value.filter(detailMoisR =>
            detailMoisR.mois.toLowerCase() == textRechercheMois.toLowerCase()
          );
        }
            // Filtrage par année scolaire
            if (anneeFiltreSP && anneeFiltreSP !='0') {
              value = value.filter(detailMoisR =>
                detailMoisR.annee_scolaire_id.toString() === anneeFiltreSP

              );
            }else{
              value = value.filter(detailMoisR =>
                detailMoisR.annee_scolaire_id.toString() === anneeFiltreSP

              );
            }

        return value;
  }
}
