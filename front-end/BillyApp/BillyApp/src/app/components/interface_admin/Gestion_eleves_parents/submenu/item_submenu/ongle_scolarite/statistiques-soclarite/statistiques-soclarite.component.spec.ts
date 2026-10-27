import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StatistiquesSoclariteComponent } from './statistiques-soclarite.component';

describe('StatistiquesSoclariteComponent', () => {
  let component: StatistiquesSoclariteComponent;
  let fixture: ComponentFixture<StatistiquesSoclariteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [StatistiquesSoclariteComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(StatistiquesSoclariteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
