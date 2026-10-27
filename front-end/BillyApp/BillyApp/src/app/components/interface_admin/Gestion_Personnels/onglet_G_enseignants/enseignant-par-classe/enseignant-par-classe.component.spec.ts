import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EnseignantParClasseComponent } from './enseignant-par-classe.component';

describe('EnseignantParClasseComponent', () => {
  let component: EnseignantParClasseComponent;
  let fixture: ComponentFixture<EnseignantParClasseComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EnseignantParClasseComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EnseignantParClasseComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
