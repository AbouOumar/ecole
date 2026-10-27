import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SalairesDesEnseignantsComponent } from './salaires-des-enseignants.component';

describe('SalairesDesEnseignantsComponent', () => {
  let component: SalairesDesEnseignantsComponent;
  let fixture: ComponentFixture<SalairesDesEnseignantsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SalairesDesEnseignantsComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SalairesDesEnseignantsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
