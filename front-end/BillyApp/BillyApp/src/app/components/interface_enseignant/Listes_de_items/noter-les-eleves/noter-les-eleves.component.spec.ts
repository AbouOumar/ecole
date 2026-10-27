import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NoterLesElevesComponent } from './noter-les-eleves.component';

describe('NoterLesElevesComponent', () => {
  let component: NoterLesElevesComponent;
  let fixture: ComponentFixture<NoterLesElevesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [NoterLesElevesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(NoterLesElevesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
