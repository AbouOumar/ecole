import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LesMatieresComponent } from './les-matieres.component';

describe('LesMatieresComponent', () => {
  let component: LesMatieresComponent;
  let fixture: ComponentFixture<LesMatieresComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [LesMatieresComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(LesMatieresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
