import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PayementDesSalairesComponent } from './payement-des-salaires.component';

describe('PayementDesSalairesComponent', () => {
  let component: PayementDesSalairesComponent;
  let fixture: ComponentFixture<PayementDesSalairesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PayementDesSalairesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PayementDesSalairesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
