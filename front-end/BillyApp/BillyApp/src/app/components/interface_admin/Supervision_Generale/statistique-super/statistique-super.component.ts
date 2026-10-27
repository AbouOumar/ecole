import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-statistique-super',
  templateUrl: './statistique-super.component.html',
  styleUrl: './statistique-super.component.css'
})
export class StatistiqueSuperComponent implements OnInit{

  ngOnInit(): void {
    window.scrollTo(0,0)
  }

}
