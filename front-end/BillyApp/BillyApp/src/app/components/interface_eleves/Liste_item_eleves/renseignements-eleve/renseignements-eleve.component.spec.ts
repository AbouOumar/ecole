import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RenseignementsEleveComponent } from './renseignements-eleve.component';

describe('RenseignementsEleveComponent', () => {
  let component: RenseignementsEleveComponent;
  let fixture: ComponentFixture<RenseignementsEleveComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RenseignementsEleveComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RenseignementsEleveComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
