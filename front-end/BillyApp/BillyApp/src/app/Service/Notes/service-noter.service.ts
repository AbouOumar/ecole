import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Noter } from '../../Classes/Noter/noter';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ServiceNoterService {

  constructor(private HttpClient: HttpClient) { }

  // Recuperer les données
  getNote():Observable<any[]> {
    return this.HttpClient.get<any[]>(environment.apiUrl+'/list-noter');
  }

  // Envoyé les données
  InsertNote(data: Noter){
    return this.HttpClient.post(environment.apiUrl+'/create-noter', data);
  }

  getNotesClasseSemestre(classeId: number, anneeScolaireId: number, semestre: number, matiere_id: number) {
    return this.HttpClient.post<any[]>(environment.apiUrl+'/list-notation', {
      classe_id: classeId,
      matiere_id: matiere_id,
      annee_scolaire_id: anneeScolaireId,
      semestre: semestre
    });
  }
  
  getResultatAnnuel(classeId: number, anneeScolaireId: number) {
    return this.HttpClient.post<any[]>(environment.apiUrl+'/list-resultatAnnuel', {
      classe_id: classeId,
      annee_scolaire_id: anneeScolaireId,
    });
  }

  getBulletinEleve(classeId: number, anneeScolaireId: number, semestre: number, eleve_id: number) {
    return this.HttpClient.post<any[]>(environment.apiUrl+'/bulletin_eleve', {
      classe_id: classeId,
      eleve_id: eleve_id,
      annee_scolaire_id: anneeScolaireId,
      semestre: semestre
    });
  }

    getImpayéEleve(eleve_id: number) {
    return this.HttpClient.get<any[]>(environment.apiUrl+'/ImpayesEleve/'+eleve_id);
  }

   getMoyenneEleve(eleve_id: number) {
    return this.HttpClient.post<any[]>(environment.apiUrl+'/MgEleve', {
      eleve_id: eleve_id,
    });
  }

  getNotesClasseSemestrielle(classeId: number, anneeScolaireId: number, semestre: number) {
    return this.HttpClient.post<any[]>(environment.apiUrl+'/list-resultatSemestriel', {
      classe_id: classeId,
      annee_scolaire_id: anneeScolaireId,
      semestre: semestre
    });
  }
  
  
  enregistrerOuModifierNote(note: any){
    return this.HttpClient.post<any>(environment.apiUrl+'/enregistrer-note',note)
  }

  getBulletinsDisponibles(){
    return this.HttpClient.get<any>(environment.apiUrl+'/list-bulletinsDisponibles')
  }

  getBulletinsDispoEl(id:number){
    return this.HttpClient.get<any>(environment.apiUrl+'/list-bulletinsDisoEleve/'+id)
  }
}
