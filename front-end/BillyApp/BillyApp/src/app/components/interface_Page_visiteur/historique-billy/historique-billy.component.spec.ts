import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HistoriqueBillyComponent } from './historique-billy.component';

describe('HistoriqueBillyComponent', () => {
  let component: HistoriqueBillyComponent;
  let fixture: ComponentFixture<HistoriqueBillyComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [HistoriqueBillyComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HistoriqueBillyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
