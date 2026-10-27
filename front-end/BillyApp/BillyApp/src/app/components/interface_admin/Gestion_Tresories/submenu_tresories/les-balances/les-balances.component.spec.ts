import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LesBalancesComponent } from './les-balances.component';

describe('LesBalancesComponent', () => {
  let component: LesBalancesComponent;
  let fixture: ComponentFixture<LesBalancesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [LesBalancesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(LesBalancesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
