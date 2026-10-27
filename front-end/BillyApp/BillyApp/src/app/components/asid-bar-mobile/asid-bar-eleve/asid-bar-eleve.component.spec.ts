import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AsidBarEleveComponent } from './asid-bar-eleve.component';

describe('AsidBarEleveComponent', () => {
  let component: AsidBarEleveComponent;
  let fixture: ComponentFixture<AsidBarEleveComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AsidBarEleveComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AsidBarEleveComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
