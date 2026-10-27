import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeDesElevesParentsComponent } from './liste-des-eleves-parents.component';

describe('ListeDesElevesParentsComponent', () => {
  let component: ListeDesElevesParentsComponent;
  let fixture: ComponentFixture<ListeDesElevesParentsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListeDesElevesParentsComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListeDesElevesParentsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
