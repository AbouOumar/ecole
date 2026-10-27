import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Actions } from '../../Classes/Personnel/actions';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})



export class ActionService {

    constructor( private httpClient: HttpClient) { }
  
    enregistrerAction(action: Actions):Observable<any>{
      return this.httpClient.post<any>(environment.apiUrl+'/create-action',action)
    }
}
