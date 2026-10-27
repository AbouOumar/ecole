import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeDesImpayeComponent } from './liste-des-impaye.component';

describe('ListeDesImpayeComponent', () => {
  let component: ListeDesImpayeComponent;
  let fixture: ComponentFixture<ListeDesImpayeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListeDesImpayeComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListeDesImpayeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
