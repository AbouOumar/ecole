import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Ins_reins } from '../../Classes/Inscription_reinscription/ins_reins';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class InsReinsService {

  constructor(private httpClient: HttpClient) { }

  getIns_reins():Observable<any>{
    return this.httpClient.get<any>(environment.apiUrl+'/list-ins_reins');

  }
  updateInsReins(ins_reins: Ins_reins,id:number):Observable<any>{
    return this.httpClient.post<any>(environment.apiUrl+'/update-ins_reins/'+id,ins_reins);

  }
  deleteInsReins(id:number):Observable<any>{
    return this.httpClient.delete<any>(environment.apiUrl+'/delete-ins_reins/'+id);

  }

  
}
