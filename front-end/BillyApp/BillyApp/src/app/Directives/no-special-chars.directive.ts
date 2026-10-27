import { Directive, ElementRef, HostListener, Renderer2 } from '@angular/core';

@Directive({
  selector: '[appNoSpecialChars]'
})
export class NoSpecialCharsDirective {
  private errorMessage: HTMLElement | null = null;
  private errorTimeout: any;

  constructor(private el: ElementRef, private renderer: Renderer2) {}

  @HostListener('input', ['$event'])
  onInputChange(event: Event) {
    const element = this.el.nativeElement as HTMLInputElement | HTMLTextAreaElement;
    const value = element.value;

    // Compter le nombre de lettres accentuées ou non
    const lettersOnly = value.match(/[a-zA-Z\u00C0-\u024F]/g) || [];
    const letterCount = lettersOnly.length;

    let sanitized = value;

    if (letterCount < 3) {
      // Interdire les chiffres et caractères spéciaux
      sanitized = value.replace(/[^a-zA-Z\s\u00C0-\u024F]/g, '');
    } else {
      // Autoriser les chiffres aussi
      sanitized = value.replace(/[^a-zA-Z0-9\s\u00C0-\u024F]/g, '');
    }

    // Si une modification est faite
    if (value !== sanitized) {
      element.value = sanitized;
      this.renderer.setStyle(element, 'border', '2px solid red');

      // Afficher le message d’erreur
      if (!this.errorMessage) {
        this.errorMessage = this.renderer.createElement('small');
        this.renderer.setStyle(this.errorMessage, 'color', 'red');
        this.renderer.setStyle(this.errorMessage, 'fontSize', '12px');
        this.renderer.setStyle(this.errorMessage, 'display', 'block');

        const text = this.renderer.createText(
          letterCount < 3
            ? '❌ Veuillez saisir au moins 3 lettres avant d’entrer des chiffres.'
            : '❌ Les caractères spéciaux ne sont pas autorisés.'
        );

        this.renderer.appendChild(this.errorMessage, text);
        this.renderer.appendChild(this.el.nativeElement.parentElement, this.errorMessage);
      }

      // Supprimer le message après 5 secondes
      clearTimeout(this.errorTimeout);
      this.errorTimeout = setTimeout(() => {
        if (this.errorMessage) {
          this.renderer.removeChild(this.el.nativeElement.parentElement, this.errorMessage);
          this.errorMessage = null;
        }
        this.renderer.removeStyle(element, 'border');
      }, 5000);
    }

    // Propager l’événement Angular
    const nativeInputEvent = new Event('input', { bubbles: true });
    element.dispatchEvent(nativeInputEvent);
  }
}
