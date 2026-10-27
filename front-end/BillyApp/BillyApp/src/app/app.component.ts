import { Component, OnInit } from "@angular/core";

interface SideNavToggle {
  screenWidth: number;
  collapsed: boolean;
}

@Component({
  selector:'app-root',
  templateUrl:'./app.component.html',
  styleUrls:['./app.component.css']
})

export class AppComponent implements OnInit {
  ngOnInit(): void {
    window.scrollTo(0,0)
  }
  title ='BillyApp';

  isSideNavCollapsed = false;
  screenWidth = 0;

  onToggleSideNav(data: SideNavToggle): void {
    this.screenWidth = data.screenWidth;
    this.isSideNavCollapsed = data.collapsed;

  }

}
