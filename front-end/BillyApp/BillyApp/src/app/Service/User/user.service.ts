import { Injectable } from '@angular/core';
import { User } from '../../Classes/Users/user';
import { json } from 'stream/consumers';
import { BehaviorSubject, Observable} from 'rxjs';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from '../../../environments/environment';
import { tap } from 'rxjs/operators';

@Injectable({ providedIn: 'root' })
export class UserService {
 private lastUrl:string='/'
  private currentUser = new BehaviorSubject<User | null>(null);

  constructor(private http: HttpClient) {
    const user = localStorage.getItem('user');
    if (user) this.currentUser.next(JSON.parse(user));
  }

  login(email: string, password: string): Observable<any> {
    return this.http.post(`${environment.apiUrl}/login`, { email, password }).pipe(
      tap((res: any) => {
        localStorage.setItem('token', res.token);
        console.log('token:'+localStorage.getItem('token'))
        localStorage.setItem('user', JSON.stringify(res.user));
        this.currentUser=res.user;
      })
    );
  }

  logout(): void {
    this.http.post(`${environment.apiUrl}/logout`, {}, { headers: this.getHeaders() }).subscribe(() => {
      localStorage.clear();
      this.currentUser.next(null);
    },
  (error)=>{
    console.error('Erreur de deconnexion')
  })
  }

    getListeUser():Observable<any[]> 
    {
      return this.http.get<any[]>(environment.apiUrl+'/listeUser');
    }

    updateUserStatut(id:number):Observable<any[]> 
    {
      return this.http.get<any[]>(environment.apiUrl+'/updateUserStatut/'+id);
    }
  
      createUser(data: FormData): Observable<any>
      {
        return this.http.post<any>(environment.apiUrl+'/createUser', data);
      }

      updateUser(data: FormData,id:number): Observable<any>
      {
        return this.http.post<any>(environment.apiUrl+'/updateUser/'+id, data);
      }


getUser() {


  const storedUser = localStorage.getItem('user');
  return storedUser ? JSON.parse(storedUser) : null;
}

  getHeaders(): HttpHeaders {
    console.log('token:'+localStorage.getItem('token'))
    const token = localStorage.getItem('token') || '';
    return new HttpHeaders({ Authorization: `Bearer ${token}` });
  }

  isLoggedIn(): boolean {
    return !!localStorage.getItem('token');
  }

  getUserObservable(): Observable<User | null> {
    return this.currentUser.asObservable();
  }



  ouvrirFichier(pj: any) {
    const token = localStorage.getItem('token');
    const headers = new HttpHeaders({
      'Authorization': `Bearer ${token}`
    });
    const url = environment.apiUrl+`/voir-fichier/${encodeURIComponent(pj)}`;
  
    // Ouvre dans nouvel onglet avec token sécurisé
    const secureWindow = window.open('', '_blank');
    this.http.get(url, { headers, responseType: 'blob' }).subscribe({
      next: (blob) => {
        const blobUrl = window.URL.createObjectURL(blob);
        secureWindow?.location.assign(blobUrl);
      },
      error: err => {
        console.error('Erreur fichier :', err);
        secureWindow?.close();
      }
    });
  }
}