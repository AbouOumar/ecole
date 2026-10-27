import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SalairesDesResponsablesComponent } from './salaires-des-responsables.component';

describe('SalairesDesResponsablesComponent', () => {
  let component: SalairesDesResponsablesComponent;
  let fixture: ComponentFixture<SalairesDesResponsablesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SalairesDesResponsablesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SalairesDesResponsablesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
