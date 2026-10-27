import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeEleveParDroitComponent } from './liste-eleve-par-droit.component';

describe('ListeEleveParDroitComponent', () => {
  let component: ListeEleveParDroitComponent;
  let fixture: ComponentFixture<ListeEleveParDroitComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListeEleveParDroitComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListeEleveParDroitComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
