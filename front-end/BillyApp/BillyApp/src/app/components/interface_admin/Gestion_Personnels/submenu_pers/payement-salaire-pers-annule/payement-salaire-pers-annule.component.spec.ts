import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PayementSalairePersAnnuleComponent } from './payement-salaire-pers-annule.component';

describe('PayementSalairePersAnnuleComponent', () => {
  let component: PayementSalairePersAnnuleComponent;
  let fixture: ComponentFixture<PayementSalairePersAnnuleComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PayementSalairePersAnnuleComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PayementSalairePersAnnuleComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
