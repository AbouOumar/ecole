import { TestBed } from '@angular/core/testing';

import { ServiceCompteService } from './service-compte.service';

describe('ServiceCompteService', () => {
  let service: ServiceCompteService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ServiceCompteService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
