import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EmploiElevePComponent } from './emploi-eleve-p.component';

describe('EmploiElevePComponent', () => {
  let component: EmploiElevePComponent;
  let fixture: ComponentFixture<EmploiElevePComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EmploiElevePComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EmploiElevePComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
