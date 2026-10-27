import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AutConnexionComponent } from './aut-connexion.component';

describe('AutConnexionComponent', () => {
  let component: AutConnexionComponent;
  let fixture: ComponentFixture<AutConnexionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AutConnexionComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AutConnexionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
