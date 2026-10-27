import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StatistiqueSuperComponent } from './statistique-super.component';

describe('StatistiqueSuperComponent', () => {
  let component: StatistiqueSuperComponent;
  let fixture: ComponentFixture<StatistiqueSuperComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [StatistiqueSuperComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(StatistiqueSuperComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
