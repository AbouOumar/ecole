import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EnregistrementEnseignantComponent } from './enregistrement-enseignant.component';

describe('EnregistrementEnseignantComponent', () => {
  let component: EnregistrementEnseignantComponent;
  let fixture: ComponentFixture<EnregistrementEnseignantComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EnregistrementEnseignantComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EnregistrementEnseignantComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
