import { Pipe, PipeTransform } from '@angular/core';
import { Ins_reins } from '../../Classes/Inscription_reinscription/ins_reins';

@Pipe({
  name: 'filtreInsReins',
})
export class FiltreInsReinsPipe implements PipeTransform {

  transform(value: any[], textRechercheIns_reins: string,  textRechercheAnnee: string, textRechercheClasse: string, anneEncoursId: string): any[] {

    if(!value) return [];
    if(!textRechercheIns_reins && (!textRechercheAnnee || textRechercheAnnee=='0') && !textRechercheClasse){
      value = value.filter(insReins =>
        insReins.annee_scolaire_id.toString() == anneEncoursId

      );
      return value;
    }


        // Filtrage par texte (nom, prénom, matricule)
        if (textRechercheIns_reins) {
          if(!textRechercheAnnee){
            textRechercheAnnee=anneEncoursId.toString();
          }
          textRechercheIns_reins=textRechercheIns_reins.toLowerCase();
          value = value.filter(insReins =>
            insReins.eleve?.matricule_eleve?.toLowerCase().includes(textRechercheIns_reins)||
            insReins.eleve?.nom_eleve?.toLowerCase().includes(textRechercheIns_reins)||
            insReins.eleve?.prenom_eleve?.toLowerCase().includes(textRechercheIns_reins)||
            insReins.eleve?.genre_eleve?.toLowerCase().includes(textRechercheIns_reins)||
            insReins.classe?.nom_classe.toLowerCase().includes(textRechercheIns_reins)||
            insReins.type.toLowerCase().includes(textRechercheIns_reins)
          );
        }

        // Filtrage par année scolaire
        if (textRechercheAnnee && textRechercheAnnee !='0') {
          value = value.filter(insReins =>
            insReins.annee_scolaire_id.toString() === textRechercheAnnee

          );
        }else{
          value = value.filter(insReins =>
            insReins.annee_scolaire_id.toString() === anneEncoursId.toString()

          );
        }

        if (textRechercheClasse && textRechercheClasse !='0') {
          if(!textRechercheAnnee){
            textRechercheAnnee=anneEncoursId.toString();
          }
          textRechercheClasse=textRechercheClasse.toLowerCase();
          value = value.filter(insReins =>
            insReins.classe_id.toString()=== textRechercheClasse

          );
        }

        return value;
  }

}
