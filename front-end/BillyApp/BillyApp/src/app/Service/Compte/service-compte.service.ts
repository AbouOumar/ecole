import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ServiceCompteService {


      constructor(private httpClient: HttpClient) { }

      // Recuperer les données
      getCompte():Observable<any[]> {
        return this.httpClient.get<any[]>(environment.apiUrl+'/list-compte');
      }
      getJournal():Observable<any[]> {
        return this.httpClient.get<any[]>(environment.apiUrl+'/liste-journal');
      }
      getBalance():Observable<any[]> {
        return this.httpClient.get<any[]>(environment.apiUrl+'/liste-balance');
      }

      getStatistiqueRapport():Observable<any[]> {
        return this.httpClient.get<any[]>(environment.apiUrl+'/statistique_rapport');
      }

      createCompte(compte: any):Observable<any>{
        return this.httpClient.post<any>(environment.apiUrl+'/create-compte',compte)
      }

      UpdateCompte(compte: any ,id:number):Observable<any>{
        return this.httpClient.post<any>(environment.apiUrl+'/update-compte/'+id,compte)
      }
}

