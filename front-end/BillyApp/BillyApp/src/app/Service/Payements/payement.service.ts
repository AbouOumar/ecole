import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Paiement } from '../../Classes/Payements/paiement';
import { BehaviorSubject, Observable, tap } from 'rxjs';
import { Reduction } from '../../Classes/Reduction/reduction';
import { PayementSalaire } from '../../Classes/payementSalaire/payementSalaire';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class PayementService {

  constructor( private HttpClient: HttpClient) { }

  enregistrerPayement(paiment: Paiement):Observable<any>{
    return this.HttpClient.post<any>(environment.apiUrl+'/create-payement',paiment)
  }

  modificationPayement(paiment: Paiement,id:number):Observable<any>{
    return this.HttpClient.post<any>(environment.apiUrl+'/update-payement/'+id,paiment)
  }

  suppressionReduction(id: number):Observable<any>{
    return this.HttpClient.delete<any>(environment.apiUrl+'/delete-reduction/'+id)
  }

  suppressionPayement(id: number):Observable<any>{
    return this.HttpClient.delete<any>(environment.apiUrl+'/delete-payement/'+id)
  }

  enregistrerReduction(reduction: Reduction):Observable<any>{
    return this.HttpClient.post<any>(environment.apiUrl+'/create-reduction',reduction)
  }
  getListeReduction(id: number):Observable<any>{
    return this.HttpClient.get<any>(environment.apiUrl+'/reductionEleveId/'+id)
  }

  getListePaiementDetails():Observable<any>{
    return this.HttpClient.get<any>(environment.apiUrl+'/listePayementDetail')
  }

  getListeImpayer():Observable<any>{
    return this.HttpClient.get<any>(environment.apiUrl+'/listeDesImpayes')
  }

  getListePayement():Observable<any>{
    return this.HttpClient.get<any>(environment.apiUrl+'/list-payement')
  }

  enregistrerPaiementSalaire(paiementSalaire:any):Observable<any>{
    return this.HttpClient.post<any>(environment.apiUrl+'/create-payement_salaire',paiementSalaire)
  }

  listePaiementSalaire():Observable<any>{
    return this.HttpClient.get<any>(environment.apiUrl+'/list-payement_salaire')
  }

  AnnulerPayementSalaire(id:number):Observable<any>{
    return this.HttpClient.delete<any>(environment.apiUrl+'/delete-payement_salaire/'+id)
  }


}
