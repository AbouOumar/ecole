import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class FonctionService {

  constructor(private httpClient: HttpClient) { }

  getFonction():Observable<any[]>{
    return this.httpClient.get<any[]>(environment.apiUrl+'/list-fonction')
  }

  getFonctionPersonnel():Observable<any[]>{
    return this.httpClient.get<any[]>(environment.apiUrl+'/list-fonction_personnel')
  }

  getFonctionMatricule(matricule:string):Observable<any[]>{
    return this.httpClient.get<any[]>(environment.apiUrl+'/show-fonction_personnel/'+matricule)
  }

  enregistrerFonctionPersonnel(data:any):Observable<any[]>{
    return this.httpClient.post<any[]>(environment.apiUrl+'/create-fonction_personnel',data)
  }

  modifierFonctionPersonnel(data:any,personnel_id:number):Observable<any[]>{
    return this.httpClient.post<any[]>(environment.apiUrl+'/update-fonction_personnel/'+personnel_id,data)
  }
}
