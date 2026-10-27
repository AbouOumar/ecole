import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HeaderElevesComponent } from './header-eleves.component';

describe('HeaderElevesComponent', () => {
  let component: HeaderElevesComponent;
  let fixture: ComponentFixture<HeaderElevesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [HeaderElevesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HeaderElevesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
