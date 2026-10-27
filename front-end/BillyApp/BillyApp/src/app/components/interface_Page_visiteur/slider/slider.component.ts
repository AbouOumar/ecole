import { Component, ElementRef, OnInit, Renderer2 } from '@angular/core';

@Component({
  selector: 'app-slider',

  templateUrl: './slider.component.html',
  styleUrl: './slider.component.css'
})
export class SliderComponent implements OnInit{

  constructor(private renderer: Renderer2, private el: ElementRef) {}

  ngOnInit(): void {
    const title = this.el.nativeElement.querySelector("#main-title");
    const subtitle = this.el.nativeElement.querySelector(".subtitle");
    const heroPushLink = this.el.nativeElement.querySelector(".hero-push-link");
    const txt = "Bienvenue à Billy École";

    const typewriter = (text: string, index: number) => {
      if (index > 3) subtitle.classList.add("active");
      if (index > 6) heroPushLink.classList.add("active");

      if (index < text.length) {
        setTimeout(() => {
          const span = this.renderer.createElement('span');
          const char = this.renderer.createText(text[index]);
          this.renderer.appendChild(span, char);
          this.renderer.appendChild(title, span);
          typewriter(text, index + 1);
        }, 200);
      }
    };

    setTimeout(() => {
      typewriter(txt, 0);
    }, 300);
  }

}
