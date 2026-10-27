import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AutCreationComponent } from './aut-creation.component';

describe('AutCreationComponent', () => {
  let component: AutCreationComponent;
  let fixture: ComponentFixture<AutCreationComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AutCreationComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AutCreationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
