import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ResultatFinDanneeCenComponent } from './resultat-fin-dannee-cen.component';

describe('ResultatFinDanneeCenComponent', () => {
  let component: ResultatFinDanneeCenComponent;
  let fixture: ComponentFixture<ResultatFinDanneeCenComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ResultatFinDanneeCenComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ResultatFinDanneeCenComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
