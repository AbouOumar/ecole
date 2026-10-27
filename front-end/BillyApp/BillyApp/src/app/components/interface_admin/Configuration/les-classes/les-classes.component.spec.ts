import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LesClassesComponent } from './les-classes.component';

describe('LesClassesComponent', () => {
  let component: LesClassesComponent;
  let fixture: ComponentFixture<LesClassesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [LesClassesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(LesClassesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
