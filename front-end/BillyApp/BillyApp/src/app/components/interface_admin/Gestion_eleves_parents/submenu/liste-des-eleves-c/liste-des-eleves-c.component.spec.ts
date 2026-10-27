import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeDesElevesCComponent } from './liste-des-eleves-c.component';

describe('ListeDesElevesCComponent', () => {
  let component: ListeDesElevesCComponent;
  let fixture: ComponentFixture<ListeDesElevesCComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListeDesElevesCComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListeDesElevesCComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
