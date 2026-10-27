import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class TypeDepenseService {

  constructor(private httpClient: HttpClient) { }
  getListTypeRecette():Observable<any[]>{
    return this.httpClient.get<any[]>(environment.apiUrl+'/list-type_recette')

  }
  getListTypeDepense():Observable<any[]>{
    return this.httpClient.get<any[]>(environment.apiUrl+'/list-type_depense')

  }

  createTypeDepense(type_depense: any):Observable<any>{
    return this.httpClient.post<any>(environment.apiUrl+'/create-type_depense',type_depense)

  }

  UpdateTypeDepense(type_depense: any ,id:number):Observable<any>{
    return this.httpClient.post<any>(environment.apiUrl+'/update-type_depense/'+id,type_depense)
  }

  deleteTypeDepense(idTypeDepense:number):Observable<any>{
    return this.httpClient.delete<any>(environment.apiUrl+'/delete-type_depense/'+idTypeDepense)
  }
}
