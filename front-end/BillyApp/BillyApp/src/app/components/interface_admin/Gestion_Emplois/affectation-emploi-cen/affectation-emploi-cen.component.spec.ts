import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AffectationEmploiCenComponent } from './affectation-emploi-cen.component';

describe('AffectationEmploiCenComponent', () => {
  let component: AffectationEmploiCenComponent;
  let fixture: ComponentFixture<AffectationEmploiCenComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AffectationEmploiCenComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AffectationEmploiCenComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
