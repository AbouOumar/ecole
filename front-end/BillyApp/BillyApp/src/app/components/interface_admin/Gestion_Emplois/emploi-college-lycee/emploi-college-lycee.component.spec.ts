import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EmploiCollegeLyceeComponent } from './emploi-college-lycee.component';

describe('EmploiCollegeLyceeComponent', () => {
  let component: EmploiCollegeLyceeComponent;
  let fixture: ComponentFixture<EmploiCollegeLyceeComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EmploiCollegeLyceeComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EmploiCollegeLyceeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
