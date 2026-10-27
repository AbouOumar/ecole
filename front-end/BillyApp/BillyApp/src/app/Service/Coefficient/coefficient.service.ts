import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class CoefficientService {

  constructor(private httpClient: HttpClient) { }

      getListCoefficient():Observable<any[]>{
        return this.httpClient.get<any[]>(environment.apiUrl+'/list-coefficient')
  
      }

      UpdateCoefficient(coefficient: any ,id:number):Observable<any>{
        return this.httpClient.post<any>(environment.apiUrl+'/update-coefficient/'+id,coefficient)
      }
}
