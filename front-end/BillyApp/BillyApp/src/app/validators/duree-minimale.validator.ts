import { AbstractControl, ValidationErrors, ValidatorFn } from '@angular/forms';
import moment from 'moment';

export function dureeMinimaleValidator(minMois: number): ValidatorFn {
  return (group: AbstractControl): ValidationErrors | null => {
    const debut = group.get('dateDebut')?.value;
    const fin = group.get('DateFin')?.value;

    if (!debut || !fin) return null;

    const diff = moment(fin).diff(moment(debut), 'months', true);
    if(diff< minMois){
        return { dureeMinimale: true }; 
    }
    if(diff> 9){
        return { dureeMax: true }; 
    }
    return null ;
  };
}