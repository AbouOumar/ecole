import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeDesActionsElevesComponent } from './liste-des-actions-eleves.component';

describe('ListeDesActionsElevesComponent', () => {
  let component: ListeDesActionsElevesComponent;
  let fixture: ComponentFixture<ListeDesActionsElevesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListeDesActionsElevesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListeDesActionsElevesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
