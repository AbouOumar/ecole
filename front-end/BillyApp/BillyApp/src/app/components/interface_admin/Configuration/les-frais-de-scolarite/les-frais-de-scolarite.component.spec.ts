import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LesFraisDeScolariteComponent } from './les-frais-de-scolarite.component';

describe('LesFraisDeScolariteComponent', () => {
  let component: LesFraisDeScolariteComponent;
  let fixture: ComponentFixture<LesFraisDeScolariteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [LesFraisDeScolariteComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(LesFraisDeScolariteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
