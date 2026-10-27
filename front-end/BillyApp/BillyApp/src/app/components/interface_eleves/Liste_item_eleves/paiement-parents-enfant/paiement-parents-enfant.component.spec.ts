import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PaiementParentsEnfantComponent } from './paiement-parents-enfant.component';

describe('PaiementParentsEnfantComponent', () => {
  let component: PaiementParentsEnfantComponent;
  let fixture: ComponentFixture<PaiementParentsEnfantComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PaiementParentsEnfantComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PaiementParentsEnfantComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
