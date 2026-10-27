import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AsideCenseurDEComponent } from './aside-censeur-de.component';

describe('AsideCenseurDEComponent', () => {
  let component: AsideCenseurDEComponent;
  let fixture: ComponentFixture<AsideCenseurDEComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AsideCenseurDEComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AsideCenseurDEComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
