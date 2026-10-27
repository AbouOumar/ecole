import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FooterSignationComponent } from './footer-signation.component';

describe('FooterSignationComponent', () => {
  let component: FooterSignationComponent;
  let fixture: ComponentFixture<FooterSignationComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [FooterSignationComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FooterSignationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
