import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeDesParentsAvecSesEnfantsComponent } from './liste-des-parents-avec-ses-enfants.component';

describe('ListeDesParentsAvecSesEnfantsComponent', () => {
  let component: ListeDesParentsAvecSesEnfantsComponent;
  let fixture: ComponentFixture<ListeDesParentsAvecSesEnfantsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListeDesParentsAvecSesEnfantsComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListeDesParentsAvecSesEnfantsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
