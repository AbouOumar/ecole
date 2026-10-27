import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeDesPersonnelsComponent } from './liste-des-personnels.component';

describe('ListeDesPersonnelsComponent', () => {
  let component: ListeDesPersonnelsComponent;
  let fixture: ComponentFixture<ListeDesPersonnelsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListeDesPersonnelsComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListeDesPersonnelsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
