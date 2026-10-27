import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PayementScoComponent } from './payement-sco.component';

describe('PayementScoComponent', () => {
  let component: PayementScoComponent;
  let fixture: ComponentFixture<PayementScoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PayementScoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PayementScoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
