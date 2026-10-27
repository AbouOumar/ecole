import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TableauDeRapprochementComponent } from './tableau-de-rapprochement.component';

describe('TableauDeRapprochementComponent', () => {
  let component: TableauDeRapprochementComponent;
  let fixture: ComponentFixture<TableauDeRapprochementComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TableauDeRapprochementComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TableauDeRapprochementComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
