import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class EmploiService {

  constructor(private httpClient: HttpClient) { }

  getMatiereProf(droit: string){
    return this.httpClient.get<any>(environment.apiUrl+"/matiereProf_droit/"+droit)
  }
  
  getEmploiClasse(classe: string){
    return this.httpClient.get<any>(environment.apiUrl+"/emploi_tempsId/"+classe)
  }

  supprimeEmploi(classe: number){
    return this.httpClient.delete<any>(environment.apiUrl+"/delete-emploi_temps/"+classe)
  }

  getEmplois(){
    return this.httpClient.get<any>(environment.apiUrl+"/list-emploi_temps")
  }

  getEmploisProf(){
    return this.httpClient.get<any>(environment.apiUrl+"/list-emploi_tempsPerson")
  }
  getEmploisParProf(personnel_id: number){
    return this.httpClient.get<any>(environment.apiUrl+"/emploi_tempsIdperson/"+personnel_id)
  }

  enregistrerMatiereProf(emploiLigne: any[]){
    return this.httpClient.post<any>(environment.apiUrl+"/create-emploi_temps",{emplois: emploiLigne})
  }
}
