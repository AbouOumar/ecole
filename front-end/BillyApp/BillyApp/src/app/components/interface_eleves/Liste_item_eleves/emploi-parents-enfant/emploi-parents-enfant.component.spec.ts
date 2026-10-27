import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EmploiParentsEnfantComponent } from './emploi-parents-enfant.component';

describe('EmploiParentsEnfantComponent', () => {
  let component: EmploiParentsEnfantComponent;
  let fixture: ComponentFixture<EmploiParentsEnfantComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EmploiParentsEnfantComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EmploiParentsEnfantComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
