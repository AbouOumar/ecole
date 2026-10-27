import { Directive, ElementRef, HostListener, Renderer2 } from '@angular/core';

@Directive({
  selector: '[appPhoneGuineaFormat]'
})
export class PhoneGuineaFormatDirective {
  constructor(private el: ElementRef, private renderer: Renderer2) {}

  // Empêcher toute touche non numérique
  @HostListener('keypress', ['$event'])
  onKeyPress(event: KeyboardEvent) {
    const allowedKeys = ['0','1','2','3','4','5','6','7','8','9'];
    if (!allowedKeys.includes(event.key)) {
      event.preventDefault(); // Bloque la frappe
    }
  }

  // Appliquer le format automatiquement
  @HostListener('input', ['$event'])
  onInput(event: Event) {
    const input = this.el.nativeElement as HTMLInputElement;

    // Enlever tout sauf les chiffres
    let raw = input.value.replace(/\D/g, '');

    // Enlever un éventuel 224 déjà saisi
    if (raw.startsWith('224')) {
      raw = raw.substring(3);
    }

    // Limiter à 9 chiffres
    raw = raw.substring(0, 9);

    // Appliquer le format
    let formatted = '+224';
    if (raw.length > 0) formatted += ' ' + raw.substring(0, 3);
    if (raw.length >= 4) formatted += ' ' + raw.substring(3, 5);
    if (raw.length >= 6) formatted += ' ' + raw.substring(5, 7);
    if (raw.length >= 8) formatted += ' ' + raw.substring(7, 9);

    input.value = formatted;

    // Événement Angular
    const e = new Event('input', { bubbles: true });
    input.dispatchEvent(e);
  }
}
