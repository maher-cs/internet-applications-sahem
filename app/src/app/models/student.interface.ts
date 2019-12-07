import { IOffer } from './offer.interface';
import { IAccount } from './account.interface';

export interface IStudent {
  studentId?: number;
  name?: string;
  brief?: string;
  major?: string;
  offers?: IOffer[];
  skills?: string[];
  account: IAccount;
}
