import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GestionNoteCenComponent } from './gestion-note-cen.component';

describe('GestionNoteCenComponent', () => {
  let component: GestionNoteCenComponent;
  let fixture: ComponentFixture<GestionNoteCenComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [GestionNoteCenComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(GestionNoteCenComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
