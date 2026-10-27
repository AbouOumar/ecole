import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ResultatTrimestrielCenseurComponent } from './resultat-trimestriel-censeur.component';

describe('ResultatTrimestrielCenseurComponent', () => {
  let component: ResultatTrimestrielCenseurComponent;
  let fixture: ComponentFixture<ResultatTrimestrielCenseurComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ResultatTrimestrielCenseurComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ResultatTrimestrielCenseurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
