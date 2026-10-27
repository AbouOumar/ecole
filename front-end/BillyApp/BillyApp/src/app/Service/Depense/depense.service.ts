import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class DepenseService {

  constructor(private httpClient:HttpClient) { }
  getListeDepense():Observable<any[]>{
    return this.httpClient.get<any[]>(environment.apiUrl+'/list-depense')
  }
  getListeRecette():Observable<any[]>{
    return this.httpClient.get<any[]>(environment.apiUrl+'/list-recette')
  }

  createDepense(depense: any):Observable<any>{
    return this.httpClient.post<any>(environment.apiUrl+'/create-depense',depense)

  }

  updateDepense(depense: any,id:number):Observable<any>{
    return this.httpClient.post<any>(environment.apiUrl+'/update-depense/'+id,depense)

  }
  getListeRecetteCasReduction():Observable<any[]>{
    return this.httpClient.get<any[]>(environment.apiUrl+'/list-recetteCasReduction')
  }

  getSituationPrevisionnel(annee: any):Observable<any[]>{
    return this.httpClient.get<any>(environment.apiUrl+'/list-situationPrevisionnelDepense/'+annee)
  }
  getSituationPrevisionnelDepense(annee: any):Observable<any[]>{
    return this.httpClient.get<any>(environment.apiUrl+'/list-comparaisonDepense/'+annee)
  }
}
