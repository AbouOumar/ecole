import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SituationPrevisionnelleComponent } from './situation-previsionnelle.component';

describe('SituationPrevisionnelleComponent', () => {
  let component: SituationPrevisionnelleComponent;
  let fixture: ComponentFixture<SituationPrevisionnelleComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SituationPrevisionnelleComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SituationPrevisionnelleComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
