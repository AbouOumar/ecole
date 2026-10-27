import { HttpErrorResponse, HttpEvent, HttpHandler, HttpInterceptor, HttpRequest } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Observable, catchError, throwError } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthInterceptorService implements HttpInterceptor {

  constructor(private router: Router) { }
  intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    const token = localStorage.getItem('token');

    const requete = token
      ? req.clone({ setHeaders: { Authorization: `Bearer ${token}` } })
      : req;

    return next.handle(requete).pipe(
      catchError((erreur: HttpErrorResponse) => {
        // Jeton expiré ou révoqué : on ferme la session et on renvoie vers la connexion
        if (erreur.status === 401 && token && !req.url.endsWith('/login')) {
          localStorage.removeItem('token');
          localStorage.removeItem('user');
          this.router.navigate(['/signIn']);
        }
        return throwError(() => erreur);
      })
    );
  }
}
