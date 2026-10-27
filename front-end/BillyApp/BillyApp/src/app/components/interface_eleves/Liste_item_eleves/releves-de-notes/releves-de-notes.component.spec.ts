import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RelevesDeNotesComponent } from './releves-de-notes.component';

describe('RelevesDeNotesComponent', () => {
  let component: RelevesDeNotesComponent;
  let fixture: ComponentFixture<RelevesDeNotesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RelevesDeNotesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RelevesDeNotesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
