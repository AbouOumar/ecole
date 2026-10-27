import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreNote',
})
export class FiltreNotePipe implements PipeTransform {

  transform(value: any[], textRecherche: string): any[] {


    if(!value) return [];
    if(!textRecherche){
      return value;
    }


        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(eleve =>
            eleve.matricule_eleve?.toLowerCase().includes(textRecherche)||
            eleve.nom_eleve?.toLowerCase().includes(textRecherche)||
            eleve.prenom_eleve?.toLowerCase().includes(textRecherche)||
            eleve.genre_eleve?.toLowerCase().includes(textRecherche)||
            eleve.classe?.nom_classe.toLowerCase().includes(textRecherche)
          );
        }

    return value;
  }

}
