import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StatistiqueCenseurComponent } from './statistique-censeur.component';

describe('StatistiqueCenseurComponent', () => {
  let component: StatistiqueCenseurComponent;
  let fixture: ComponentFixture<StatistiqueCenseurComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [StatistiqueCenseurComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(StatistiqueCenseurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
