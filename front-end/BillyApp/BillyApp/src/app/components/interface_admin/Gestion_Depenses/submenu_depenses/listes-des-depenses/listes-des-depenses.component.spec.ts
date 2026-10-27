import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListesDesDepensesComponent } from './listes-des-depenses.component';

describe('ListesDesDepensesComponent', () => {
  let component: ListesDesDepensesComponent;
  let fixture: ComponentFixture<ListesDesDepensesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListesDesDepensesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListesDesDepensesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
