import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RecetteHorsScolariteComponent } from './recette-hors-scolarite.component';

describe('RecetteHorsScolariteComponent', () => {
  let component: RecetteHorsScolariteComponent;
  let fixture: ComponentFixture<RecetteHorsScolariteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RecetteHorsScolariteComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RecetteHorsScolariteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
