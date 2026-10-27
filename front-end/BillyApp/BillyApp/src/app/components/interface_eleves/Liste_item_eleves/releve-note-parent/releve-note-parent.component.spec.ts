import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReleveNoteParentComponent } from './releve-note-parent.component';

describe('ReleveNoteParentComponent', () => {
  let component: ReleveNoteParentComponent;
  let fixture: ComponentFixture<ReleveNoteParentComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ReleveNoteParentComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ReleveNoteParentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
