import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EmploiDuTempsElevesComponent } from './emploi-du-temps-eleves.component';

describe('EmploiDuTempsElevesComponent', () => {
  let component: EmploiDuTempsElevesComponent;
  let fixture: ComponentFixture<EmploiDuTempsElevesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EmploiDuTempsElevesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EmploiDuTempsElevesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
