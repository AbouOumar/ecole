import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AnneeScolaireService {

    constructor(private HttpClient: HttpClient) { }

      // Recuperer les données
      getAnneeScolaire():Observable<any[]> {
        return this.HttpClient.get<any[]>(environment.apiUrl+'/list-anneeScolaire');
      }

      getSemestreAnneeScolaire():Observable<any[]> {
        return this.HttpClient.get<any[]>(environment.apiUrl+'/list-semestreAnnee');
      }
    
      createAnneeScolaire(annee: any):Observable<any>{
        return this.HttpClient.post<any>(environment.apiUrl+'/create-anneeScolaire',annee)
    
      }
    
      updateAnneeScoalaire(annee: any,id:number):Observable<any>{
        return this.HttpClient.post<any>(environment.apiUrl+'/update-anneeScolaire/'+id,annee)
    
      }

      deleleteAnneeScoalaire(id:number):Observable<any>{
        return this.HttpClient.delete<any>(environment.apiUrl+'/delete-anneeScolaire/'+id)
    
      }
}
