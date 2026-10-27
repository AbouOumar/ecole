import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ListeDesPayementScolariteComponent } from './liste-des-payement-scolarite.component';

describe('ListeDesPayementScolariteComponent', () => {
  let component: ListeDesPayementScolariteComponent;
  let fixture: ComponentFixture<ListeDesPayementScolariteComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ListeDesPayementScolariteComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ListeDesPayementScolariteComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
