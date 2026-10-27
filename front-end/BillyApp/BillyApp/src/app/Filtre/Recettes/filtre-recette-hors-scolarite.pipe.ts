import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreRecetteHorsScolarite',
})
export class FiltreRecetteHorsScolaritePipe implements PipeTransform {

  transform(value: any[], textRechercheRectteHorsSco: string): any[] {


    if(!value) return [];
    if(!textRechercheRectteHorsSco){
      return value;
    }


        // Filtrage
        if (textRechercheRectteHorsSco) {
          textRechercheRectteHorsSco=textRechercheRectteHorsSco.toLowerCase();
          value = value.filter(depense =>
            depense.created_at?.toLowerCase().includes(textRechercheRectteHorsSco)||
            depense.compte?.nomCompte.toLowerCase().includes(textRechercheRectteHorsSco)||
            depense.description?.toLowerCase().includes(textRechercheRectteHorsSco)
          );
        }
    return value;
  }

}
