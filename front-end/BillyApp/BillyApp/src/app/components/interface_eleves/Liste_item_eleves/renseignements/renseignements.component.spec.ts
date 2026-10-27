import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RenseignementsComponent } from './renseignements.component';

describe('RenseignementsComponent', () => {
  let component: RenseignementsComponent;
  let fixture: ComponentFixture<RenseignementsComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RenseignementsComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RenseignementsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
