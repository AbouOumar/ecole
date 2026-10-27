import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-nos-matiere-cours',
  templateUrl: './nos-matiere-cours.component.html',
  styleUrls: ['./nos-matiere-cours.component.css']
})
export class NosMatiereCoursComponent implements OnInit {
  ngOnInit(): void {
    window.scrollTo(0,0)
  }
  matieres = [
    {
      titre: 'Mathématiques',
      description: 'Cours de calcul, algèbre et géométrie.',
      image: 'assets/imgCours/math.png',
      lien: '/details/maths'
    },
    {
      titre: 'Physique',
      description: 'Cours sur la mécanique, l’électricité et l’optique.',
      image: 'assets/imgCours/physics.png',
      lien: '/details/physique'
    },
    {
      titre: 'Géographie',
      description: 'Étude des continents, des pays et des climats.',
      image: 'assets/imgCours/geography.png',
      lien: '/details/geographie'
    },
    {
      titre: 'Biologie',
      description: 'Étude des organismes vivants.',
      image: 'assets/imgCours/biology.png',
      lien: '/details/biologie'
    },
    {
      titre: 'Chimie',
      description: 'Étude des réactions chimiques et des éléments.',
      image: 'assets/imgCours/chemistry.png',
      lien: '/details/chimie'
    },
    {
      titre: 'Français',
      description: 'Maîtrise de la langue et de la littérature française.',
      image: 'assets/imgCours/french.png',
      lien: '/details/français'
    },
    {
      titre: 'Histoire',
      description: 'Exploration des événements marquants.',
      image: 'assets/imgCours/history.png',
      lien: '/details/histoire'
    },
    {
      titre: 'Éducation et Morale',
      description: 'Apprentissage des valeurs morales et sociales.',
      image: 'assets/imgCours/ethics.png',
      lien: '/details/education'
    },
    {
      titre: 'Anglais',
      description: 'Perfectionnement de la langue anglaise.',
      image: 'assets/imgCours/english.png',
      lien: '/details/anglais'
    },
  ];

}
