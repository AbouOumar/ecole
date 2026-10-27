import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-container-visiteur',
  templateUrl: './container-visiteur.component.html',
  styleUrls: ['./container-visiteur.component.css']
})
export class ContainerVisiteurComponent implements OnInit{

   constructor(private fb: FormBuilder) {}

  ngOnInit(): void {
    this.contactForm = this.fb.group({
      nom: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      objet: ['', Validators.required],
      message: ['', [Validators.required, Validators.minLength(20)]]
    });
  }

  onSubmit(): void {
    if (this.contactForm.valid) {
      console.log('Message envoyé :', this.contactForm.value);
      // Tu peux ici envoyer à un backend ou afficher une alerte
      this.contactForm.reset();
    }
  }


  eleves = [
    {
      rang: 1,
      nom: 'Fatimah Barry',
      classe: '3ème A',
      moyenne: 18.5,
      mention: 'Très Bien',
      photo: 'assets/images/eleve1.jpg'
    },
    {
      rang: 2,
      nom: 'Moussa Cissé',
      classe: '4ème B',
      moyenne: 17.9,
      mention: 'Très Bien',
      photo: 'assets/images/eleve2.jpg'
    },
    {
      rang: 3,
      nom: 'Mariam Camara',
      classe: '5ème C',
      moyenne: 17.3,
      mention: 'Bien',
      photo: 'assets/images/eleve3.jpg'
    }
  ];


  classes = [
    {
      teacherImg: 'assets/images/bg-billy01.jpg',   // <- corrigé
      studentImg: 'assets/images/classe.jpg', // <- corrigé
      title: 'Les Élèves en Classe',
      subtitle: 'Nos élèves développent des compétences solides et nourrissent une passion continue pour l\'apprentissage.',
      description: 'Dans chaque salle de classe, nos élèves bénéficient d\'un encadrement de qualité, mêlant pédagogie moderne et respect des valeurs éducatives.',
      features: [
        ' Lecture et explication des cours',
        ' Exercices pratiques en salle',
        ' Évaluations régulières',
        ' Suivi et accompagnement individuel',
      ],
      buttonText: 'Voir plus'
    }
  ];

  sports = [
    {
      SportImg: 'assets/images/sport.jpg',
      title: '🏆 Activités Sportives',
      subtitle: 'Le sport, un pilier de l\'éducation et du développement personnel.',
      description: 'À travers diverses disciplines sportives, nos élèves développent l\'esprit d\'équipe, la discipline et une bonne condition physique.',
      features: [
        ' Football scolaire',
        ' Athlétisme (course, saut, lancer)',
        ' Jeux traditionnels (course en sac, tir à la corde)',
        ' Danse et gymnastique éducative',
      ],
      buttonText: 'Voir plus'
    }
  ];

  infos = [
    {
      titre: "Elèves En Classe",
      description: "Nos élèves cultivent des compétences solides et une passion pour l’apprentissage.",
      image: "assets/images/classe.jpg"
    },
    {
      titre: "Activités Sportives",
      description: "Les élèves s’épanouissent à travers diverses activités sportives.",
      image: "assets/images/sport.jpg"
    },
    {
      titre: "Bibliothèque",
      description: "La bibliothèque de Billy-École propose des ressources pour encourager la recherche aut.",
      image: "assets/images/bibliotheque.jpg"
    },
    {
      titre: "Événements Scolaires",
      description: "Les événements scolaires renforcent l’esprit communautaire d Billy-École.",
      image: "assets/images/feux.jpg"
    }
  ];


  professeurs = [
    { nom: 'Mme Aissatou Bah', matiere: 'Mathématiques', image: 'assets/images/eleve1.jpg' },
    { nom: 'Mr Mamadou Diallo', matiere: 'Physique-Chimie', image: 'assets/images/eleve2.jpg' },
    { nom: 'Mme Fanta Sow', matiere: 'Histoire-Géographie', image: 'assets/images/eleve3-1.jpg' },
    { nom: 'Mr Amadou  Dioubaté ', matiere: 'Anglais', image: 'assets/images/eleve3-2.jpg' },
    { nom: 'Mme Fatoumata Barry', matiere: 'Philosophie', image: 'assets/images/feux.jpg' },
    { nom: 'Mr Amadou Bah', matiere: 'SVT', image: 'assets/images/classe.jpg' },
    { nom: 'Mme Mariama Kaba', matiere: 'Français', image: 'assets/images/bibliotheque.jpg' },
    { nom: 'Mr Ousmane Sylla', matiere: 'Éducation Civique', image: 'assets/images/eleve1.jpg' }
  ];

  selectedProf: any = null;

afficherDetails(prof: any) {
  this.selectedProf = prof;
}


  currentPage = 1;
  itemsPerPage = 4;

  get professeursAffiches() {
    const start = (this.currentPage - 1) * this.itemsPerPage;
    return this.professeurs.slice(start, start + this.itemsPerPage);
  }

  get totalPages() {
    return Math.ceil(this.professeurs.length / this.itemsPerPage);
  }

  changePage(page: number) {
    if (page >= 1 && page <= this.totalPages) {
      this.currentPage = page;
    }
  }

  //
  frais = [
    { nom: '7ᵉ année', tranche1: '200 000 FG', tranche2: '200 000 FG', tranche3: '200 000 FG', total: '600 000 FG' },
    { nom: '8ᵉ année', tranche1: '225 000 FG', tranche2: '225 000 FG', tranche3: '225 000 FG', total: '675 000 FG' },
    { nom: '9ᵉ année (BEPC)', tranche1: '250 000 FG', tranche2: '250 000 FG', tranche3: '250 000 FG', total: '750 000 FG' },
    { nom: '10ᵉ année', tranche1: '275 000 FG', tranche2: '275 000 FG', tranche3: '275 000 FG', total: '825 000 FG' },
    { nom: '11ᵉ année', tranche1: '300 000 FG', tranche2: '300 000 FG', tranche3: '300 000 FG', total: '900 000 FG'}
  ]

  evenements = [
    {
      date: '15 novembre 2024',
      titre: 'Journée Portes Ouvertes',
      description: 'Découvrez notre école et rencontrez nos professeurs'
    },
    {
      date: '5 décembre 2024',
      titre: 'Compétition de Sciences',
      description: 'Concours pour les meilleurs scientifique'
    },
    {
      date: '10 janvier 2025',
      titre: 'Réunion Parents-Professeurs',
      description: 'Bilan du premier semestre et objectifs pour le suivant'
    }
  ];



  contactForm!: FormGroup;

  images: string[] = [
    '/assets/images/bg-billy-2.jpg',
    // '/assets/images/bg-billy-3.jpg',
    '/assets/images/bg-billy-4.jpg',
    // '/assets/images/bg-billy-5.jpg'
  ];


}
