import { ComponentFixture, TestBed } from '@angular/core/testing';

import { OrganiserEvaSenceurComponent } from './organiser-eva-senceur.component';

describe('OrganiserEvaSenceurComponent', () => {
  let component: OrganiserEvaSenceurComponent;
  let fixture: ComponentFixture<OrganiserEvaSenceurComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [OrganiserEvaSenceurComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(OrganiserEvaSenceurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
