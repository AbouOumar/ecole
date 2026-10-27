import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AsideDGComponent } from './aside-dg.component';

describe('AsideDGComponent', () => {
  let component: AsideDGComponent;
  let fixture: ComponentFixture<AsideDGComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AsideDGComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AsideDGComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
