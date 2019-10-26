import { IOffer } from './offer.interface';

export interface IStudent {
  id: number;
  name: string;
  studentId: number;
  major: string;
  dateOfBirth: string;
  offers: IOffer[];
}
