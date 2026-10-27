import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PaimentElevePComponent } from './paiment-eleve-p.component';

describe('PaimentElevePComponent', () => {
  let component: PaimentElevePComponent;
  let fixture: ComponentFixture<PaimentElevePComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PaimentElevePComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PaimentElevePComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
