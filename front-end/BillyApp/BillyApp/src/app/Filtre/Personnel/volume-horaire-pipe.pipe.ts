import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'volumeHorairePipe',
})
export class VolumeHorairePipePipe implements PipeTransform {

  transform(value: any[],  textRecherche: string,  anneEncours: string,textRechercheAnnee: string): any[] {
    if(!value) return [];
    if((!textRecherche || textRecherche=='0') && !textRechercheAnnee){
      value = value.filter(annee =>
        annee.annee_scolaire_id == anneEncours

      );
      return value;
    }

      // Filtrage par année scolaire
      if (textRechercheAnnee && textRechercheAnnee !='0') {
        value = value.filter(volumeHoraire =>
          volumeHoraire.annee_scolaire_id.toString() === textRechercheAnnee
  
        );
      }

    if (textRecherche && textRecherche !='0') {
      textRecherche=textRecherche.toLowerCase();
      value = value.filter(volumeHoraire =>
        volumeHoraire.personnel?.matricule_personnel?.toLowerCase().includes(textRecherche)||
        volumeHoraire.personnel?.nom_personnel?.toLowerCase().includes(textRecherche)||
        volumeHoraire.personnel?.prenom_personnel?.toLowerCase().includes(textRecherche)||
        volumeHoraire.mois?.toLowerCase().includes(textRecherche)
      );
    }else{
      value = value.filter(volumeHoraire =>
        volumeHoraire.annee_scolaire_id == anneEncours

      );
    }



        return value;
  }

}
