import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TypeDePensesComponent } from './type-de-penses.component';

describe('TypeDePensesComponent', () => {
  let component: TypeDePensesComponent;
  let fixture: ComponentFixture<TypeDePensesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TypeDePensesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TypeDePensesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
