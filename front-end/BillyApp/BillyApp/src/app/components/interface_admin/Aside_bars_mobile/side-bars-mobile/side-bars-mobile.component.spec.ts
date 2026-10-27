import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SideBarsMobileComponent } from './side-bars-mobile.component';

describe('SideBarsMobileComponent', () => {
  let component: SideBarsMobileComponent;
  let fixture: ComponentFixture<SideBarsMobileComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SideBarsMobileComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SideBarsMobileComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
