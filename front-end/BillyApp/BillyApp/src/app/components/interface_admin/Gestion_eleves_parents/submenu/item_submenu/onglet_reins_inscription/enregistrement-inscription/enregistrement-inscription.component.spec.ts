import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EnregistrementInscriptionComponent } from './enregistrement-inscription.component';

describe('EnregistrementInscriptionComponent', () => {
  let component: EnregistrementInscriptionComponent;
  let fixture: ComponentFixture<EnregistrementInscriptionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EnregistrementInscriptionComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EnregistrementInscriptionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
