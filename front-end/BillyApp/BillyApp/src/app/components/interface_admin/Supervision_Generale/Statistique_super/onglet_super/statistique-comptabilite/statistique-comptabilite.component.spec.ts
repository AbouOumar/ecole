import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StatistiqueComptabiliteComponent } from './statistique-comptabilite.component';

describe('StatistiqueComptabiliteComponent', () => {
  let component: StatistiqueComptabiliteComponent;
  let fixture: ComponentFixture<StatistiqueComptabiliteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [StatistiqueComptabiliteComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(StatistiqueComptabiliteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
