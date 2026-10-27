import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DetailsInfoPersComponent } from './details-info-pers.component';

describe('DetailsInfoPersComponent', () => {
  let component: DetailsInfoPersComponent;
  let fixture: ComponentFixture<DetailsInfoPersComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [DetailsInfoPersComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(DetailsInfoPersComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
