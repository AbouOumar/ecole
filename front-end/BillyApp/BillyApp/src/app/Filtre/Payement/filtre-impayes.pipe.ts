import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreImpayes',
})
export class FiltreImpayesPipe implements PipeTransform {

  transform(value: any[], textRecherche: string, textRechercheClasse: Number): any[] {


    if(!value) return [];
    if(!textRecherche && !textRechercheClasse){
      return value;
    }


        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(listeImpay =>
            listeImpay.matricule_eleve?.toLowerCase().includes(textRecherche)||
            listeImpay.parent_contact?.toLowerCase().includes(textRecherche)||
            listeImpay.nom_complet_eleve?.toLowerCase().includes(textRecherche)
          );
        }


    if (textRechercheClasse && textRechercheClasse !=0) {
      value = value.filter(listeImpay =>
        listeImpay.classe_id== textRechercheClasse

      );
    }

    return value;
  }

}
