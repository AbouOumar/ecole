import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class VolumeHoraireService {

  constructor(private httpClient: HttpClient) { }

    getListVolumeHoraire():Observable<any[]>{
      return this.httpClient.get<any[]>(environment.apiUrl+'/list-volume_horaire')

    }

    createVolumeHoraire(volume_horaire: any):Observable<any>{
      return this.httpClient.post<any>(environment.apiUrl+'/create-volume_horaire',volume_horaire)

    }

    UpdateVolumeHoraire(volume_horaire: any ,id:number):Observable<any>{
      return this.httpClient.post<any>(environment.apiUrl+'/update-volume_horaire/'+id,volume_horaire)
    }

    deleteVolumeHoraire(idVolumeHoraire:number):Observable<any>{
      return this.httpClient.delete<any>(environment.apiUrl+'/delete-volume_horaire/'+idVolumeHoraire)
    }
}
