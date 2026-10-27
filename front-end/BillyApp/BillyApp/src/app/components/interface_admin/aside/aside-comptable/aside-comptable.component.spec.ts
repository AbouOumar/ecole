import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AsideComptableComponent } from './aside-comptable.component';

describe('AsideComptableComponent', () => {
  let component: AsideComptableComponent;
  let fixture: ComponentFixture<AsideComptableComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [AsideComptableComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AsideComptableComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
