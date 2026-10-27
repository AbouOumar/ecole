import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { ReverseRouteMap, RouteMap } from './route-map.service';

@Injectable({
  providedIn: 'root'
})

export class RouteCryptoServiceService {

  constructor(private router: Router) {}

  // Permet de naviguer vers une route logique (ex: 'admin'), mais dans l’URL on voit l’alias chiffré
  navigateTo(logicalPath: any): void {
    const encrypted = RouteMap[logicalPath]; // On récupère l'alias chiffré
    console.log("crypte: "+encrypted)
    if (encrypted) {
      this.router.navigate(['/' + encrypted]); // Navigation vers l'alias chiffré
    } else {
      this.router.navigate(['/404']); // Si la route n'existe pas, on redirige vers une 404
    }
  }

  getRoute(logicalPath: any):string{
    console.log(logicalPath)
      const encrypted = RouteMap[logicalPath]; // On récupère l'alias chiffré
      console.log(encrypted)
      if (encrypted) {
        this.router.navigate(['/' + encrypted]); // Navigation vers l'alias chiffré
      } else {
        this.router.navigate(['/404']); // Si la route n'existe pas, on redirige vers une 404
      }
      return RouteMap[logicalPath]
  }

  // Quand on arrive sur une route chiffrée, on la convertit en chemin lisible
  resolvePathFromURL(alias: string): string {
    return ReverseRouteMap[alias] || '404'; // Si l'alias n'existe pas, on retourne 404
  }
}