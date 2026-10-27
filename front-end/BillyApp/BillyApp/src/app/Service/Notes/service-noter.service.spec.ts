import { TestBed } from '@angular/core/testing';

import { ServiceNoterService } from './service-noter.service';

describe('ServiceNoterService', () => {
  let service: ServiceNoterService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ServiceNoterService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
