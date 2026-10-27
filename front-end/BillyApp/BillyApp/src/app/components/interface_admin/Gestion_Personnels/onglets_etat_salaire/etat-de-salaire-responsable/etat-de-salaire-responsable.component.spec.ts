import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EtatDeSalaireResponsableComponent } from './etat-de-salaire-responsable.component';

describe('EtatDeSalaireResponsableComponent', () => {
  let component: EtatDeSalaireResponsableComponent;
  let fixture: ComponentFixture<EtatDeSalaireResponsableComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EtatDeSalaireResponsableComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EtatDeSalaireResponsableComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
