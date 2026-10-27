import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EnteteEtatImpComponent } from './entete-etat-imp.component';

describe('EnteteEtatImpComponent', () => {
  let component: EnteteEtatImpComponent;
  let fixture: ComponentFixture<EnteteEtatImpComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EnteteEtatImpComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EnteteEtatImpComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
