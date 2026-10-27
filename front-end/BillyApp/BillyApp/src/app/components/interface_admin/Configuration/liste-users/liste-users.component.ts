import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UserService } from '../../../../Service/User/user.service';
import { User } from '../../../../Classes/Users/user';
import {ToastrService } from 'ngx-toastr';
import { environment } from '../../../../../environments/environment';
  declare var bootstrap: any;




@Component({
  selector: 'app-liste-users',
 
  templateUrl: './liste-users.component.html',
  styleUrl: './liste-users.component.css'
})
export class ListeUsersComponent implements OnInit{

      constructor(private toastr: ToastrService,private serviceUser: UserService, private fb: FormBuilder){}
  
       users: any[]=[];
       soldeTotal: number = 0
       ajouterUserForm!: FormGroup
       updateUserForm!: FormGroup
       idSelected: number=0;
        messageUpdate:string=''
        password:string=''
        editModal: any;
        image_error: string = '';
       message : string = ''
       verifyuser: User=new User()
       selectedUser: User=new User()
       selectedFile: File | null = null;
        adresseIp: string = ""
    ngOnInit(): void {
    this.adresseIp= environment. ip
    if(typeof bootstrap !== 'undefined'){
        this.editModal = new bootstrap.Modal(document.getElementById('modifierNouveauUser')!);
     }
    this.chargeUser();
  
  

  


    this.updateUserForm = this.fb.group({
      prenomUser: ['', Validators.required],
      nomUser: ['', Validators.required],
      telephoneUser: [''],
      password: [''],
      email: ['', Validators.required],
      photosUser: [''],
     //Fin Enregistrment user
    });
  
    }
  
  
  modifierStatut(id:number){
    this.serviceUser.updateUserStatut
  }
  
  
  
    chargeUser(){
      this.serviceUser.getListeUser().subscribe(
        (response)=>{
          this.users = response
        },
        (error) =>{
          console.error("Erreur lors du chargment des user.",error)
        }
      )
  
    }
  
    
  
      onSubmitUpdate() {
        this.image_error=""
        if(this.updateUserForm.valid){
            var formData = new FormData();
          if(this.selectedFile){
            formData.append("photosUser",this.selectedFile);
          }
          if(this.password){
            formData.append("password",this.password);
          }else{
            formData.append("password","");
          }
          formData.append("prenomUser",this.updateUserForm.value.prenomUser);
          formData.append("nomUser",this.updateUserForm.value.nomUser);
          formData.append("telephoneUser",this.updateUserForm.value.telephoneUser);          
          formData.append("email",this.updateUserForm.value.email);
          this.serviceUser.updateUser(formData,this.idSelected).subscribe(
            (response)=>{
              this.chargeUser();
              this.messageUpdate= response.message;
              this.toastr.success(response.message,"Succès")
              setTimeout(() => {
                this.messageUpdate= '';
              }, 4000);
  
            },
            (error)=>{
              this.messageUpdate="Erreur lors de la modification";
              console.error(error);
            }
          );
        }else{
      window.scrollTo(0,0);
      this.updateUserForm.markAllAsTouched(); // Force l'affichage des erreurs si les champs sont vides
      return;
    }
      }
  
      ouvreModal(id: number){
        const user= this.users.find(el => el.id === id);
          if(user){
            this.selectedUser=user;
            this.updateUserForm.patchValue({
              prenomUser:user.prenomUser,
              nomUser:user.nomUser,
              telephoneUser:user.telephoneUser,
              email:user.email,
            })
            
            this.idSelected=id;
            this.message=""
          }
      }
  
      changeStatut(id: number){
            this.serviceUser.updateUserStatut(id).subscribe(
              (response:any)=>{
                this.chargeUser();
                this.toastr.success(response.message,"Succès")
              })
      }
      


          // Mise à jour de l'image
    onImageSelected(event: any,fileInput:HTMLInputElement) {
      const file = event.target.files[0]  // Récupère le premier fichier sélectionné

      if(file) {
        if(file.size > 2 * 1024 * 1024){
          this.image_error="le fichier est trop volumineux, selectioner un autre, max 2Mo"
          fileInput.value=''
        }else{
          this.image_error=""
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

    }
}
