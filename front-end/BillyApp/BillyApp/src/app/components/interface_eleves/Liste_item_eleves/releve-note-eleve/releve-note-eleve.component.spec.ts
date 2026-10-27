import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ReleveNoteEleveComponent } from './releve-note-eleve.component';

describe('ReleveNoteEleveComponent', () => {
  let component: ReleveNoteEleveComponent;
  let fixture: ComponentFixture<ReleveNoteEleveComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ReleveNoteEleveComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ReleveNoteEleveComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
