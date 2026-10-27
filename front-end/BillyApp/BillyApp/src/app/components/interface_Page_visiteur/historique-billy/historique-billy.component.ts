import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-historique-billy',
  templateUrl: './historique-billy.component.html',
  styleUrls: ['./historique-billy.component.css']
})
export class HistoriqueBillyComponent implements OnInit{
  ngOnInit(): void {
    window.scrollTo(0,0)
  }
  enseignantsParPage = 3;
  pageActuelle = 1;

  enseignants = [
    {
      nom: 'M. Alhassane Diallo',
      matiere: 'Comptable',
      description: "Diplômé en Mathématiques appliquées de l'Université de Conakry avec plus de 10 ans d’expérience en enseignement.",
      photo: 'assets/imgCours/math.png'
    },
    {
      nom: 'Mme Fatimah Baldé',
      matiere: 'Secrétaire',
      description: "Master en Lettres modernes de l’Université de Paris, enseignant avec 8 ans d’expérience, passionné par la lecture et l’écriture.",
      photo: 'assets/images/eleve1.jpg'
    },
    {
      nom: 'M. Aboulaye Camara',
      matiere: 'Proviseur',
      description: "Diplômé en Histoire et Géographie, il met l'accent sur la compréhension des cultures et des civilisations du monde.",
      photo: 'assets/imgCours/geography.png'
    },
    {
      nom: 'Mme Fatoumata Barry',
      matiere: 'Directeur des études',
      description: "Professeure d'Anglais diplômée, elle accompagne les élèves avec des méthodes interactives et motivantes.",
      photo: 'assets/imgCours/english.png'
    },
    {
      nom: 'M. Ibrahima Bah',
      matiere: 'Directeur financier',
      description: "Expert en Physique-Chimie avec plus de 12 ans d’enseignement dans les lycées et collèges.",
      photo: 'assets/imgCours/physics.png'
    },

    {
      nom: 'M. Ibrahima Bah',
      matiere: 'Chimiste',
      description: "Étude des réactions chimiques et des éléments.",
      photo: 'assets/imgCours/chemistry.png'
    },
    {
      nom: 'Mme Fatoumata Barry',
      matiere: 'Directeur des études',
      description: "Professeure d'Anglais diplômée, elle accompagne les élèves avec des méthodes interactives et motivantes.",
      photo: 'assets/imgCours/english.png'
    },
    {
      nom: 'M. Ibrahima Bah',
      matiere: 'Directeur financier',
      description: "Expert en Physique-Chimie avec plus de 12 ans d’enseignement dans les lycées et collèges.",
      photo: 'assets/images/bg-billy-5.jpg'
    },

    {
      nom: 'M. Ibrahima Bah',
      matiere: 'Chimiste',
      description: "Étude des réactions chimiques et des éléments.",
      photo: 'assets/images/bg-billy-3.jpg'
    },
  ];

  get enseignantsAffiches() {
    const start = (this.pageActuelle - 1) * this.enseignantsParPage;
    return this.enseignants.slice(start, start + this.enseignantsParPage);
  }

  totalPages(): number {
    return Math.ceil(this.enseignants.length / this.enseignantsParPage);
  }

  changerPage(index: number): void {
    this.pageActuelle = index;
  }
}
