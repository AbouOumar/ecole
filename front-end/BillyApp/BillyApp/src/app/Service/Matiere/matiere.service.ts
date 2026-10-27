import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class MatiereService {

  constructor(private httpClient: HttpClient) { }

  getMatiere(){
    return this.httpClient.get<any[]>(environment.apiUrl+'/list-matiere')
  }

  

  createMatiere(matiere: any):Observable<any>{
    return this.httpClient.post<any>(environment.apiUrl+'/create-matiere',matiere)

  }

  UpdateMatiere(matiere: any ,id:number):Observable<any>{
    return this.httpClient.post<any>(environment.apiUrl+'/update-matiere/'+id,matiere)
  }

  deleteMatiere(idmatiere:number):Observable<any>{
    return this.httpClient.delete<any>(environment.apiUrl+'/delete-matiere/'+idmatiere)
  }
}
