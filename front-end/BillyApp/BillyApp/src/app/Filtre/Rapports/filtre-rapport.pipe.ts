import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreRapport',
})
export class FiltreRapportPipe implements PipeTransform {

  transform(value: any[], textRechercheMois: string, moisEncours: string): any[] {
    if(!value) return [];
    if(!textRechercheMois){
      value = value.filter(stati_eleve =>
        stati_eleve.mois.toLowerCase() == moisEncours.toLowerCase()
      );

      return value;
    }

            // Filtrage par Mois
        if (textRechercheMois) {
          value = value.filter(stati_eleve =>
            stati_eleve.mois.toLowerCase()== textRechercheMois.toLowerCase()

          );
        }

        return value;
  }
}

