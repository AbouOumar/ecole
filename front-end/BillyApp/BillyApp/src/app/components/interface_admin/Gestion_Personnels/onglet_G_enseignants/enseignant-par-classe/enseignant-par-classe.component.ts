import { Component, OnInit } from '@angular/core';
import { PersonnelService } from '../../../../../Service/Personnel/personnel.service';


@Component({
  selector: 'app-enseignant-par-classe',

  templateUrl: './enseignant-par-classe.component.html',
  styleUrl: './enseignant-par-classe.component.css'
})
export class EnseignantParClasseComponent implements OnInit {
  enseignantMatieres: any[]=[]
  message: string=""
  messaged: string=""
  textRecherche: string=""
  idSelected!: number

  constructor(public personnelService: PersonnelService){}
  ngOnInit(): void {
    this.chargeEnseignantMatiere()
  }
  chargeEnseignantMatiere() {
    this.personnelService.getListeEnseignantParMatieres().subscribe(
      (response)=>{
          this.enseignantMatieres=response
      },
      (error)=>{
        console.error('Erreur lors du chargement des affectations')
      }
    )
  }
  selectedFile: File | null = null;


  onImageSelected(event: any) {
    const file = event.target.files[0]  // Récupère le premier fichier sélectionné

    if(file) {
      this.selectedFile = file;
      const reader = new FileReader();

 // Dès que la lecture de l'image est terminée

     reader.onload = () => {
      const imageElement = document.getElementById('imagePreview') as HTMLImageElement;
      imageElement.src = reader.result as string; // Met à jour la source de l'image
     };

     // Lire le fichier comme une URL de données
    reader.readAsDataURL(file);


  }

  }


  deleteTypeDepense(idSelected:number){
    this.personnelService.suppressionAffectation(idSelected).subscribe(
      (response)=>{
        this.chargeEnseignantMatiere()
        this.message= response.message;
        setTimeout(() => {
          this.message= '';
        }, 4000);
      },
      (error)=>{
        this.messaged="Cette affectation est déjà utilisé";
        console.error(error);
      }
    );
  }


ouvreModal(id: number){
      this.idSelected=id;
      this.message=""
      
}

}
