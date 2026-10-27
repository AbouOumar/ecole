import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NosMatiereCoursComponent } from './nos-matiere-cours.component';

describe('NosMatiereCoursComponent', () => {
  let component: NosMatiereCoursComponent;
  let fixture: ComponentFixture<NosMatiereCoursComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [NosMatiereCoursComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(NosMatiereCoursComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
