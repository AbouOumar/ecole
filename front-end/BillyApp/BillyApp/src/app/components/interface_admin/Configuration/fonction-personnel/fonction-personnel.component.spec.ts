import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FonctionPersonnelComponent } from './fonction-personnel.component';

describe('FonctionPersonnelComponent', () => {
  let component: FonctionPersonnelComponent;
  let fixture: ComponentFixture<FonctionPersonnelComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [FonctionPersonnelComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FonctionPersonnelComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
