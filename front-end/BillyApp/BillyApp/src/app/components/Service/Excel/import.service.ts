import { Injectable } from '@angular/core';
import * as XLSX from 'xlsx';

@Injectable({
  providedIn: 'root'
})
export class ImportService {

  constructor() { }


  // Méthode pour importer les données depuis un fichier Excel
  importerDepuisExcel(event: any): Promise<any[]> {
    return new Promise((resolve, reject) => {
      const file = event.target.files[0]; // On récupère le fichier
      const reader: FileReader = new FileReader();

      // Quand le fichier est chargé
      reader.onload = (e: any) => {
        const bstr: string = e.target.result;
        const wb: XLSX.WorkBook = XLSX.read(bstr, { type: 'binary' }); // Lecture du fichier Excel
        const wsname: string = wb.SheetNames[0]; // On prend la première feuille
        const ws: XLSX.WorkSheet = wb.Sheets[wsname];

        // Conversion des données en tableau d'objets
        const data = XLSX.utils.sheet_to_json(ws, { defval: '' });

        resolve(data); // Retourne les données
      };

      // Gestion des erreurs de lecture
      reader.onerror = (error) => {
        reject(error);
      };

      reader.readAsBinaryString(file); // Lecture du fichier en binaire
    });
  }
}
