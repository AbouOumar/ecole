import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StatistiqueDEComponent } from './statistique-de.component';

describe('StatistiqueDEComponent', () => {
  let component: StatistiqueDEComponent;
  let fixture: ComponentFixture<StatistiqueDEComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [StatistiqueDEComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(StatistiqueDEComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
