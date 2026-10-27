import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EtatSalaireComponent } from './etat-salaire.component';

describe('EtatSalaireComponent', () => {
  let component: EtatSalaireComponent;
  let fixture: ComponentFixture<EtatSalaireComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EtatSalaireComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EtatSalaireComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
