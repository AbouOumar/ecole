import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RecetteEtCasReductionComponent } from './recette-et-cas-reduction.component';

describe('RecetteEtCasReductionComponent', () => {
  let component: RecetteEtCasReductionComponent;
  let fixture: ComponentFixture<RecetteEtCasReductionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RecetteEtCasReductionComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RecetteEtCasReductionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
