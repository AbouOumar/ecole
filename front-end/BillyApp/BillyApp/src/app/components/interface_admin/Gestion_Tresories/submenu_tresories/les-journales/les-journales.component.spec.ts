import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LesJournalesComponent } from './les-journales.component';

describe('LesJournalesComponent', () => {
  let component: LesJournalesComponent;
  let fixture: ComponentFixture<LesJournalesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [LesJournalesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(LesJournalesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
