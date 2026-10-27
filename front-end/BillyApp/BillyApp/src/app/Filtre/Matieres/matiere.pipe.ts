import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'matiere',
})
export class MatierePipe implements PipeTransform {

  transform(value: any[], textRecherche: string): any[] {


    if(!value) return [];
    if(!textRecherche){
      return value;
    }
        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(matiere =>
            matiere.libelle_matiere?.toLowerCase().includes(textRecherche)||
            matiere.type?.toLowerCase().includes(textRecherche)||
            matiere.description?.toLowerCase().includes(textRecherche)
          );
        }

    return value;
  }

}
