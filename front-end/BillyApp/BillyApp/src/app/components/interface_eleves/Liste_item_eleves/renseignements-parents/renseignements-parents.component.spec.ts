import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RenseignementsParentsComponent } from './renseignements-parents.component';

describe('RenseignementsParentsComponent', () => {
  let component: RenseignementsParentsComponent;
  let fixture: ComponentFixture<RenseignementsParentsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RenseignementsParentsComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RenseignementsParentsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
