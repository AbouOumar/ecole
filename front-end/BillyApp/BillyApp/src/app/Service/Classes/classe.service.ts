import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ClasseService {

    constructor(private HttpClient: HttpClient) { }

    // Recuperer les données
    getClasse():Observable<any[]> {
      return this.HttpClient.get<any[]>(environment.apiUrl+'/list-classe');
    }

    // Recuperer les données
    getfraisClasse(id_classe: any):Observable<any> {
      console.log("id "+id_classe)
      return this.HttpClient.get<any[]>(environment.apiUrl+'/fraisParClasseId/'+id_classe);
    }
}
