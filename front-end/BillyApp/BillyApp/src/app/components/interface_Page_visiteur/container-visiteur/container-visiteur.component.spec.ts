import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ContainerVisiteurComponent } from './container-visiteur.component';

describe('ContainerVisiteurComponent', () => {
  let component: ContainerVisiteurComponent;
  let fixture: ComponentFixture<ContainerVisiteurComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ContainerVisiteurComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ContainerVisiteurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
