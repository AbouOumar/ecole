import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EtatDeSalaireEnseignantComponent } from './etat-de-salaire-enseignant.component';

describe('EtatDeSalaireEnseignantComponent', () => {
  let component: EtatDeSalaireEnseignantComponent;
  let fixture: ComponentFixture<EtatDeSalaireEnseignantComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EtatDeSalaireEnseignantComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EtatDeSalaireEnseignantComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
