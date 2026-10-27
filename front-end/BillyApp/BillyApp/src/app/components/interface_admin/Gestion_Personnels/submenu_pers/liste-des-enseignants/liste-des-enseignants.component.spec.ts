import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeDesEnseignantsComponent } from './liste-des-enseignants.component';

describe('ListeDesEnseignantsComponent', () => {
  let component: ListeDesEnseignantsComponent;
  let fixture: ComponentFixture<ListeDesEnseignantsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListeDesEnseignantsComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListeDesEnseignantsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
