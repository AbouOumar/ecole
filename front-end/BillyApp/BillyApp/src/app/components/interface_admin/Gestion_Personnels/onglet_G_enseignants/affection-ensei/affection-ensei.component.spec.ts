import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AffectionEnseiComponent } from './affection-ensei.component';

describe('AffectionEnseiComponent', () => {
  let component: AffectionEnseiComponent;
  let fixture: ComponentFixture<AffectionEnseiComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AffectionEnseiComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AffectionEnseiComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
