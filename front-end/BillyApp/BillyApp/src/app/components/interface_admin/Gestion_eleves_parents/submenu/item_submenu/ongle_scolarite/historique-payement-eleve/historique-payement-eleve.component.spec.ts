import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HistoriquePayementEleveComponent } from './historique-payement-eleve.component';

describe('HistoriquePayementEleveComponent', () => {
  let component: HistoriquePayementEleveComponent;
  let fixture: ComponentFixture<HistoriquePayementEleveComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [HistoriquePayementEleveComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HistoriquePayementEleveComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
