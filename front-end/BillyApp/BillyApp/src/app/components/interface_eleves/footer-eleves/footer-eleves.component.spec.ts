import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FooterElevesComponent } from './footer-eleves.component';

describe('FooterElevesComponent', () => {
  let component: FooterElevesComponent;
  let fixture: ComponentFixture<FooterElevesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [FooterElevesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FooterElevesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
