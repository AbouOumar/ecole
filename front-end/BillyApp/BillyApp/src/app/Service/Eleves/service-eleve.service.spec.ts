import { TestBed } from '@angular/core/testing';

import { ServiceEleveService } from './service-eleve.service';

describe('ServiceEleveService', () => {
  let service: ServiceEleveService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ServiceEleveService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
