import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreSituationPrevisionnel',
})
export class FiltreSituationPrevisionnelPipe implements PipeTransform {

  transform(value: any[],  textRechercheMois: string): any[] {
    if(!value) return [];
    if(!textRechercheMois){
      return value;
    }
                // Filtrage par Mois
        if (textRechercheMois) {
          value = value.filter(detailMoisR =>
            detailMoisR.mois.toLowerCase()== textRechercheMois.toLowerCase()

          );
        }
       


        return value;
  }

}
