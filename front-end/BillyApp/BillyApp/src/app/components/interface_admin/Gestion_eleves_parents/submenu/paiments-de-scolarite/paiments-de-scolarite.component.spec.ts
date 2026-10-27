import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PaimentsDeScolariteComponent } from './paiments-de-scolarite.component';

describe('PaimentsDeScolariteComponent', () => {
  let component: PaimentsDeScolariteComponent;
  let fixture: ComponentFixture<PaimentsDeScolariteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [PaimentsDeScolariteComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PaimentsDeScolariteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
