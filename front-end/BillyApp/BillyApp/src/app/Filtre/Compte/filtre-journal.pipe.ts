import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreJournal',
})
export class FiltreJournalPipe implements PipeTransform {


  transform(value: any[], textRecherche: string,   textRechercheCompte: string, textRechercheType: string): any[] {


    if(!value) return [];
    if(!textRecherche && !textRechercheCompte &&!textRechercheType){
      return value;
    }



        // Filtrage par texte (nom, prénom, matricule)
        if (textRecherche) {
          textRecherche=textRecherche.toLowerCase();
          value = value.filter(journals =>
            journals.date?.toLowerCase().includes(textRecherche)||
            journals.evenement?.toLowerCase().includes(textRecherche)
          );
        }


          // Filtrage par compte
      if (textRechercheCompte) {
        value = value.filter(journals =>
          journals.compte_id== textRechercheCompte
        );
      }


       // Filtrage par type
       if (textRechercheType) {
        value = value.filter(journals =>
          journals.type.toString() === textRechercheType

        );
      }

    return value;
  }

}
