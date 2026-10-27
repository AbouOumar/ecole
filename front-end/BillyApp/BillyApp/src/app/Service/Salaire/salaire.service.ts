import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Salaire } from '../../Classes/Salaire/salaire';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class SalaireService {

  constructor(private httpClient: HttpClient) { }
    modificationSalaire(id: any,salaire: any):Observable<any>{
      return this.httpClient.put<any>(environment.apiUrl+'/update-salaire/'+id,salaire)
    }

    enregistrementSalaire(salaire: any):Observable<any>{
      return this.httpClient.post<any>(environment.apiUrl+'/create-salaire',salaire)
    }

    etatSalaireGlobal():Observable<any[]>{
      return this.httpClient.get<any>(environment.apiUrl+'/getEtatSalaireGlobal')
    }

    AnnulerSalaire(id:number):Observable<any>{
      return this.httpClient.delete<any>(environment.apiUrl+'/delete-salaire/'+id)
    }
}
