import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListePersonnelsParDroitComponent } from './liste-personnels-par-droit.component';

describe('ListePersonnelsParDroitComponent', () => {
  let component: ListePersonnelsParDroitComponent;
  let fixture: ComponentFixture<ListePersonnelsParDroitComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListePersonnelsParDroitComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListePersonnelsParDroitComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
