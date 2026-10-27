import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'affectationClasse',
})
export class AffectationClassePipe implements PipeTransform {

  transform(value: any[], textRecherche: string): any[] {


    if(!value) return [];
    if(!textRecherche){
      return value;
    }
        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(affectation=>
            affectation.enseigner.personnel.matricule_personnel?.toLowerCase().includes(textRecherche)||
            affectation.enseigner.personnel.nom_personnel?.toLowerCase().includes(textRecherche)||
            affectation.enseigner.personnel.prenom_personnel?.toLowerCase().includes(textRecherche)||
            affectation.enseigner.matiere.libelle_matiere?.toLowerCase().includes(textRecherche)||
            affectation.classe.nom_classe?.toLowerCase().includes(textRecherche)||
            affectation.enseigner.personnel.tel_personnel?.toLowerCase().includes(textRecherche)
          );
        }

    return value;
  }

}
