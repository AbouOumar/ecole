import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'affectation',
})
export class AffectationPipe implements PipeTransform {

  transform(value: any[], textRecherche: string): any[] {


    if(!value) return [];
    if(!textRecherche){
      return value;
    }
        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(enseignant =>
            enseignant.matricule_personnel?.toLowerCase().includes(textRecherche)||
            enseignant.nom_personnel?.toLowerCase().includes(textRecherche)||
            enseignant.prenom_personnel?.toLowerCase().includes(textRecherche)||
            enseignant.tel_personnel?.toLowerCase().includes(textRecherche)
          );
        }

    return value;
  }

}
