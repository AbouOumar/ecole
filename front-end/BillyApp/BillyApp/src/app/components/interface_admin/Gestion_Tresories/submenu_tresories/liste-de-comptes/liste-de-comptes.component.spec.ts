import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeDeComptesComponent } from './liste-de-comptes.component';

describe('ListeDeComptesComponent', () => {
  let component: ListeDeComptesComponent;
  let fixture: ComponentFixture<ListeDeComptesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListeDeComptesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListeDeComptesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
