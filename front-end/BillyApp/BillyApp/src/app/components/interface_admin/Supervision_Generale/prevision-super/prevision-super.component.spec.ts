import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PrevisionSuperComponent } from './prevision-super.component';

describe('PrevisionSuperComponent', () => {
  let component: PrevisionSuperComponent;
  let fixture: ComponentFixture<PrevisionSuperComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PrevisionSuperComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PrevisionSuperComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
