import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreEleve',
})
export class FiltreElevePipe implements PipeTransform {

  transform(value: any[], textRecherche: string, textRechercheClasse: Number,textRechercheEtat: string): any[] {


    if(!value) return [];
    if(!textRecherche && !textRechercheClasse && !textRechercheEtat){
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

        // Filtrage par texte (nom, prénom, matricule)
        if (textRechercheEtat) {
          textRechercheEtat=textRechercheEtat.toLowerCase();
          value = value.filter(eleve =>
            eleve.classe_id==textRechercheEtat
          );
        }


    if (textRechercheClasse && textRechercheClasse !=0) {
      value = value.filter(eleve =>
        eleve.classe_id== textRechercheClasse

      );
    }

    return value;
  }

}
