import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReinsInscriptionComponent } from './reins-inscription.component';

describe('ReinsInscriptionComponent', () => {
  let component: ReinsInscriptionComponent;
  let fixture: ComponentFixture<ReinsInscriptionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ReinsInscriptionComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ReinsInscriptionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
