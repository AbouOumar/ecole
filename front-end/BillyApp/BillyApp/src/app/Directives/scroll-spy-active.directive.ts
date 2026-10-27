import { Directive, ElementRef, HostListener, Input, Renderer2 } from '@angular/core';
import { NavigationEnd, Router } from '@angular/router';

@Directive({
  selector: '[appScrollSpyActive]',
})
export class ScrollSpyActiveDirective {
  @Input() appScrollSpyActive: string = '';
  @Input() routePath: string = ''; // chemin de route pour les liens vers d'autres pages

  constructor(
    private el: ElementRef,
    private renderer: Renderer2,
    private router: Router
  ) {
    // Écoute les changements de route
    this.router.events.subscribe(event => {
      if (event instanceof NavigationEnd) {
        this.updateRouteActive();
      }
    });
  }

  @HostListener('window:scroll', [])
  onScroll(): void {
    if (this.routePath) return; // ne rien faire si c’est une route externe
    const section = document.getElementById(this.appScrollSpyActive);
    if (section) {
      const top = section.offsetTop - 100;
      const bottom = top + section.offsetHeight;
      const scrollPosition = window.pageYOffset;

      if (scrollPosition >= top && scrollPosition < bottom) {
        this.renderer.addClass(this.el.nativeElement, 'active');
      } else {
        this.renderer.removeClass(this.el.nativeElement, 'active');
      }
    }
  }

  private updateRouteActive(): void {
    const currentRoute = this.router.url;
    if (currentRoute === this.routePath) {
      this.renderer.addClass(this.el.nativeElement, 'active');
    } else {
      this.renderer.removeClass(this.el.nativeElement, 'active');
    }
  }


}
