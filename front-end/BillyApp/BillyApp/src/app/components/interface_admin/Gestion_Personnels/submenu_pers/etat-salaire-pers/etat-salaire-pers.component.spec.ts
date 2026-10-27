import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EtatSalairePersComponent } from './etat-salaire-pers.component';

describe('EtatSalairePersComponent', () => {
  let component: EtatSalairePersComponent;
  let fixture: ComponentFixture<EtatSalairePersComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EtatSalairePersComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EtatSalairePersComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
