import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filtreActionParent',

})
export class FiltreActionParentPipe implements PipeTransform {
  transform(value: any[], textRechercheEnfant: string, ): any[] {


    if(!value) return [];
    if(!textRechercheEnfant){
           return value;
    }

        if (textRechercheEnfant && textRechercheEnfant !='0') {

          value = value.filter(action =>
            action.id_eleve.toString() == textRechercheEnfant.toString()

          );
        }

      return value;
  }

}
