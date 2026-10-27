import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreSituationPreNiveau',
})
export class FiltreSituationPreNiveauPipe implements PipeTransform {

  transform(value: any[],  textRechercheNiveau: string): any[] {
    if(!value) return [];
    if(!textRechercheNiveau){
      return value;
    }
                // Filtrage par Mois
        if (textRechercheNiveau) {
          value = value.filter(niveaux =>
            niveaux.niveau== textRechercheNiveau

          );
        }



        return value;
  }

}
