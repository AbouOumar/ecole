import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EtatSalaireDGComponent } from './etat-salaire-dg.component';

describe('EtatSalaireDGComponent', () => {
  let component: EtatSalaireDGComponent;
  let fixture: ComponentFixture<EtatSalaireDGComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EtatSalaireDGComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EtatSalaireDGComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
