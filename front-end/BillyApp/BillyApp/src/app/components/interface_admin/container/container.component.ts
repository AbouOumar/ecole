import { Component } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-container',
  templateUrl: './container.component.html',
  styleUrls: ['./container.component.css']
})
export class ContainerComponent {
  // pagePath: string = '';

  // constructor(private route: ActivatedRoute, private router: Router) {}

  ngOnInit() {
    // this.router.events.subscribe(() => {
    //   this.pagePath = this.route.snapshot.firstChild?.routeConfig?.path || 'listeEleveParent';
    // });
  }
}
