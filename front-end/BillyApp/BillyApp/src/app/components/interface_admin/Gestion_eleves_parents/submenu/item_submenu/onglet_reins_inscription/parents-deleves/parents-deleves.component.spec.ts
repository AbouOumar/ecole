import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ParentsDelevesComponent } from './parents-deleves.component';

describe('ParentsDelevesComponent', () => {
  let component: ParentsDelevesComponent;
  let fixture: ComponentFixture<ParentsDelevesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ParentsDelevesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ParentsDelevesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
