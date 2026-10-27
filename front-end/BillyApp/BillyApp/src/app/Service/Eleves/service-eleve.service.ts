import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
import { Eleve } from '../../Classes/Eleves/eleve';
import { Ins_reins } from '../../Classes/Inscription_reinscription/ins_reins';
import { Eleve_typer } from '../../models/eleves';
import { environment } from '../../../environments/environment';


@Injectable({
  providedIn: 'root'
})
export class ServiceEleveService {

  private eleveData = new BehaviorSubject<any>(null);

  private eleveParent: Eleve_typer[] = []

  constructor(private HttpClient: HttpClient) { }


    getEleves():Observable<any[]> {
      return this.HttpClient.get<any[]>(environment.apiUrl+'/list-eleve');
    }
    getEleveMatricule(matricule: any){
      return this.HttpClient.get<any[]>(environment.apiUrl+'/showMatricule/'+matricule);
    }

      EnregistrementEleve(data: FormData): Observable<any>
      {
        return this.HttpClient.post<any>(environment.apiUrl+'/enregistrer_eleve', data);
      }

      //Inscription et reiscription

      Ins_reinscription(ins_reins: Ins_reins){
          return this.HttpClient.post(environment.apiUrl+'/create-ins_reins', ins_reins);
        }
         //Afficher la liste des eleves
         getListEleve():Observable<any[]> {
          return this.HttpClient.get<any[]>(environment.apiUrl+'/list-eleve');
        }

          //Afficher la liste des eleves par droit
          getListEleveDroit(droit:string):Observable<any[]> {
          return this.HttpClient.get<any[]>(environment.apiUrl+'/eleve_droit/'+droit);
        }

        //Afficher la liste des eleves par enseignant
        getListEleveEnseig(idEnseignant:number):Observable<any[]> {
          return this.HttpClient.get<any[]>(environment.apiUrl+'/eleve_droitEnsei/'+idEnseignant);
        }
        setEleveData(data: any) {
          this.eleveData.next(data);
        }


        getEleveParents(id: Number){
          return this.HttpClient.get<any[]>(environment.apiUrl+'/parent_eleveId/'+id);
        }

         // Liste des Actions
        getEleveActions(id: Number){
          return this.HttpClient.get<any[]>(environment.apiUrl+'/actionEleveId/'+id);
        }

        // Modification des l'élèves
        modificationEleve(data: Eleve,id: Number, photo: File): Observable<any>
        {
          const formData =new FormData();
          formData.append('data',JSON.stringify(data));
          if(photo){
            formData.append('photo',photo);
          }

          return this.HttpClient.post<any>(environment.apiUrl+'/update-eleve/'+id, formData);
        }

        // Statistique élève
        getStatistiqueEleve():Observable<any> {
          return this.HttpClient.get<any>(environment.apiUrl+'/list-statistique_rapprochement')
        }

        getStatistiqueMois():Observable<any> {
          return this.HttpClient.get<any>(environment.apiUrl+'/statistique_rapprochementMoisAnnee')
        }

        // Info card tableau rapprechement
        getStatistiqueRapprochmentAnnee(annee: string ):Observable<any>{
          return this.HttpClient.get<any>(environment.apiUrl+'/statistique_rapprochement_annee/'+annee)
        }

        // Paiment frais de la scolaritée
        getPaiementScolariteEleve(matricule: string):Observable<any>{
          return this.HttpClient.get<any>(environment.apiUrl+'/frais_scolariteEleve/'+matricule)
        }

        //tableau de bord de la comptabilité
        getDasbord_comptable():Observable<any> {
          return this.HttpClient.get<any>(environment.apiUrl+'/dasbord_comptable')
        }
}
