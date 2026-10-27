import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EtatSalaireMasseSalarialeComponent } from './etat-salaire-masse-salariale.component';

describe('EtatSalaireMasseSalarialeComponent', () => {
  let component: EtatSalaireMasseSalarialeComponent;
  let fixture: ComponentFixture<EtatSalaireMasseSalarialeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EtatSalaireMasseSalarialeComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EtatSalaireMasseSalarialeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
