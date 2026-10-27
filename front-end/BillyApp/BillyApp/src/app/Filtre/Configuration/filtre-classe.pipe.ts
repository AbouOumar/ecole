import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreClasse',

})
export class FiltreClassePipe implements PipeTransform {

  transform(value: any[], textRecherche: string): any[] {


    if(!value) return [];
    if(!textRecherche){
      return value;
    }
        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(classe=>           
            classe?.option?.nom_option?.toLowerCase().includes(textRecherche)||
            classe.classe.nom_classe?.toLowerCase().includes(textRecherche)
          );
        }

    return value;
  }

}
