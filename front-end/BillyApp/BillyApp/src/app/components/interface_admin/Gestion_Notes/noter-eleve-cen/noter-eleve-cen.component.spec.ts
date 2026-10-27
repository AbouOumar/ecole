import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NoterEleveCenComponent } from './noter-eleve-cen.component';

describe('NoterEleveCenComponent', () => {
  let component: NoterEleveCenComponent;
  let fixture: ComponentFixture<NoterEleveCenComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [NoterEleveCenComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(NoterEleveCenComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
