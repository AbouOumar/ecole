import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Parents } from '../../Classes/Parents/parents';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ParentService {

  constructor(private httpClient: HttpClient) { }

  getParentPersonnel():Observable<any[]>{
    return this.httpClient.get<any[]>(environment.apiUrl+'/getListeParentPersonnel');
  }

  modificationParent(id: number,parent: Parents):Observable<any>{
    return this.httpClient.put<any>(environment.apiUrl+'/update-parent/'+id,parent)
  }

  enregistrerParent(id: number,parent: Parents):Observable<any>{
    return this.httpClient.post<any>(environment.apiUrl+'/create-parent/'+id,parent)
  }

  getParentsEleve(id: Number){
    return this.httpClient.get<any[]>(environment.apiUrl+'/eleve_parentId/'+id);
  }
  getPersonelEleve(id: Number){
    return this.httpClient.get<any[]>(environment.apiUrl+'/eleve_PersonnelId/'+id);
  }

  getParent(telephone_parent: string){
    return this.httpClient.get<any[]>(environment.apiUrl+'/parentTelephone/'+telephone_parent);
  }

    // Liste des Actions
    getParentActions(data: any){
    return this.httpClient.post<any[]>(environment.apiUrl+'/actionParentId',data);
  }

      // Liste des Actions
      getPersonnelActions(id: Number){
        return this.httpClient.get<any[]>(environment.apiUrl+'/actionParentId/'+id);
      }


}
