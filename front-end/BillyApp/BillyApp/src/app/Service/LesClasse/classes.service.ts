import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ClassesService {

  constructor(private httpClient: HttpClient) { }
    getListClasse():Observable<any[]>{
      return this.httpClient.get<any[]>(environment.apiUrl+'/list-desclasse')

    }

    getListClass():Observable<any[]>{
      return this.httpClient.get<any[]>(environment.apiUrl+'/list-classe')

    }
    getListClassDroit(droit:string):Observable<any[]>{
      return this.httpClient.get<any[]>(environment.apiUrl+'/list-classeDroit/'+droit)

    }
    getListClassEnseignant(id:number):Observable<any[]>{
      return this.httpClient.get<any[]>(environment.apiUrl+'/personnel/'+id+'/classes')

    }

    getListMatiereDroit(droit:string):Observable<any[]>{
      return this.httpClient.get<any[]>(environment.apiUrl+'/matiereDroit/'+droit)

    }
    getListMatiereEnseignant(id: number):Observable<any[]>{
      return this.httpClient.get<any[]>(environment.apiUrl+'/personnel/'+id+'/matieres')

    }

    getListNiveau():Observable<any[]>{
      return this.httpClient.get<any[]>(environment.apiUrl+'/list-ficheRenseignement')

    }

    createClasse(classe: any):Observable<any>{
      return this.httpClient.post<any>(environment.apiUrl+'/create-classe',classe)

    }

    UpdateClasse(classe: any ,id:number):Observable<any>{
      return this.httpClient.post<any>(environment.apiUrl+'/update-classe/'+id,classe)
    }

    UpdateFrais(frais: any ,id:number):Observable<any>{
      return this.httpClient.post<any>(environment.apiUrl+'/update-ficheRenseignement/'+id,frais)
    }

    deleteClasse(idClasse:number):Observable<any>{
      return this.httpClient.delete<any>(environment.apiUrl+'/delete-classe/'+idClasse)
    }
}
