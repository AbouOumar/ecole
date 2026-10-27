import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'personnelPipe',
})
export class PersonnelPipePipe implements PipeTransform {

  transform(value: any[], textRecherche: string, textRechercheFonction: string): any[] {


    if(!value) return [];
    if(!textRecherche && !textRechercheFonction){
      return value;
    }


        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(personnel =>
            personnel.matricule?.toLowerCase().includes(textRecherche)||
            personnel.nomPrenom?.toLowerCase().includes(textRecherche)||
            personnel.tel_personnel?.toLowerCase().includes(textRecherche)||
            personnel.mail_personnel?.toLowerCase().includes(textRecherche)||
            personnel.fonction?.toLowerCase().includes(textRecherche)||
            personnel.adresse_personnel.toLowerCase().includes(textRecherche)
          );
        }


    if (textRechercheFonction && textRechercheFonction !='0') {
      value = value.filter(personnel =>
        personnel.idfonction.toString() == textRechercheFonction.toString()
      );
    }

    return value;
  }

}
