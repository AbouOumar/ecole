import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Personnel } from '../../Classes/Personnel/personnel';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class PersonnelService {

  constructor(private httpClient: HttpClient) { }
    modificationPersonnel(id: number,personnel: FormData):Observable<any>{
      return this.httpClient.post<any>(environment.apiUrl+'/update-personnel/'+id,personnel)
    }
    // Affiche les salaires des responsable
    getPersonnelDetailSalaire():Observable<any[]>{
      return this.httpClient.get<any[]>(environment.apiUrl+'/getPersonnel-salaireDetail')
    }
    
    // Affiche la liste des responsable
    getListeResponsale():Observable<any> {
      return this.httpClient.get<any>(environment.apiUrl+'/list-personnel')
    }

      // Affiche la liste des responsable
      getTousPersonnel():Observable<any> {
        return this.httpClient.get<any>(environment.apiUrl+'/list-tousPersonnel')
      }
      // Affiche la liste des responsable
      getListeResponsaleInfo(matricule:string):Observable<any> {
        return this.httpClient.get<any>(environment.apiUrl+'/showMatriculePersonnel/'+matricule)
      }

        // Affiche la liste des enseignants par matiere
        getListeEnseignantParMatieres():Observable<any> {
          return this.httpClient.get<any>(environment.apiUrl+'/list-affecter')
        }

    // Affiche les salaires des enseignants
    getSalaireEnseignants():Observable<any> {
      return this.httpClient.get<any>(environment.apiUrl+'/getEnseignant-salaireDetail')
    }
    // Affiche la liste des enseignants
    getListeEnseignants():Observable<any> {
      return this.httpClient.get<any>(environment.apiUrl+'/list-enseignant')
    }

    // Affiche la liste des enseignants et matiere
    getListeEnseignantMatiere():Observable<any> {
      return this.httpClient.get<any>(environment.apiUrl+'/personnel/matieres')
    }

    // Affiche des enseignant par matière
    getListeEnseignantParMatiere(id: number):Observable<any> {
      return this.httpClient.get<any>(environment.apiUrl+'/getPersonnelMatiere/'+id)
    }

    // Affiche des enseignant par matière
    getPersonnelTel(telephone_parent: string):Observable<any> {
      return this.httpClient.get<any>(environment.apiUrl+'/showTelephoneP/'+telephone_parent)
    }

    // Affiche des enseignant par matière
    getEnseignantMatricule(matricule: string):Observable<any> {
      return this.httpClient.get<any>(environment.apiUrl+'/showMatriculePersonnel/'+matricule)
    }
    // Affiche des les matiere enseigner
    EnregistrerEnseigner(data: any):Observable<any> {
      console.log(data)
      return this.httpClient.post<any>(environment.apiUrl+'/create-enseigner',data)
    }

    // Affiche des les matiere enseigner
    EnregistrerAffecter(data: any):Observable<any> {
      console.log(data)
      return this.httpClient.post<any>(environment.apiUrl+'/create-affecter',data)
    }


    // Affiche les salaires des enseignant par matière
    getListeActionMois(data: any):Observable<any> {
      return this.httpClient.post<any>(environment.apiUrl+'/getactionPersonnelId',data)
    }

    // Affiche la liste des enfants du personnel
    getListeEnfant(id: number):Observable<any> {
      return this.httpClient.get<any>(environment.apiUrl+'/eleve_personnelId/'+id)
    }

    // Affiche la liste des enfants du personnel
    suppressionAction(id: number):Observable<any> {
      return this.httpClient.delete<any>(environment.apiUrl+'/delete-action/'+id)
    }

    // Affiche la liste des enfants du personnel
    suppressionAffectation(id: number):Observable<any> {
      return this.httpClient.delete<any>(environment.apiUrl+'/delete-affecter/'+id)
    }
    

    EnregistrementPersonnel(data: FormData): Observable<any>
    {
      return this.httpClient.post<any>(environment.apiUrl+'/create-personnel', data);
    }


}
