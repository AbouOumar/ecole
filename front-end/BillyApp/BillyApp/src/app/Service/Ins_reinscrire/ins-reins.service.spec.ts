import { TestBed } from '@angular/core/testing';

import { InsReinsService } from './ins-reins.service';

describe('InsReinsService', () => {
  let service: InsReinsService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(InsReinsService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
