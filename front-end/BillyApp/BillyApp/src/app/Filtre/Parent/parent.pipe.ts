import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreParent',
})
export class ParentPipe implements PipeTransform {

  transform(value: any[], textRecherche: string): any[] {


    if(!value) return [];
    if(!textRecherche){
      return value;
    }


        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(parent =>
            parent.nom_parent?.toLowerCase().includes(textRecherche)||
            parent.prenom_parent?.toLowerCase().includes(textRecherche)||
            parent.telephone_parent?.toLowerCase().includes(textRecherche)||
            parent.nbre_enfant?.toString().includes(textRecherche)||
            parent.adresse_parent?.toLowerCase().includes(textRecherche)||
            parent.profession?.toLowerCase().includes(textRecherche)||
            parent.create_date?.toLowerCase().includes(textRecherche)||
            parent.type?.toLowerCase().includes(textRecherche)

          );
        }

    return value;
  }

}
