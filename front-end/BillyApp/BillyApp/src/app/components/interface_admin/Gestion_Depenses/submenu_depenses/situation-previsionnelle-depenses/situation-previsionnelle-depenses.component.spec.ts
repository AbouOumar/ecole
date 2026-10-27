import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SituationPrevisionnelleDepensesComponent } from './situation-previsionnelle-depenses.component';

describe('SituationPrevisionnelleDepensesComponent', () => {
  let component: SituationPrevisionnelleDepensesComponent;
  let fixture: ComponentFixture<SituationPrevisionnelleDepensesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SituationPrevisionnelleDepensesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SituationPrevisionnelleDepensesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
