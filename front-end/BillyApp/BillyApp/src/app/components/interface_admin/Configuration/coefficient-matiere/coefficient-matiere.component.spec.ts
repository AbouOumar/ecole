import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CoefficientMatiereComponent } from './coefficient-matiere.component';

describe('CoefficientMatiereComponent', () => {
  let component: CoefficientMatiereComponent;
  let fixture: ComponentFixture<CoefficientMatiereComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CoefficientMatiereComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CoefficientMatiereComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
