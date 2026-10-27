import { TestBed } from '@angular/core/testing';

import { RouteCryptoServiceService } from './route-crypto-service.service';

describe('RouteCryptoServiceService', () => {
  let service: RouteCryptoServiceService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(RouteCryptoServiceService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
