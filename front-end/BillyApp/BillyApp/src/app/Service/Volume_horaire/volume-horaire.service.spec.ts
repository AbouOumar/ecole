import { TestBed } from '@angular/core/testing';

import { VolumeHoraireService } from './volume-horaire.service';

describe('VolumeHoraireService', () => {
  let service: VolumeHoraireService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(VolumeHoraireService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
