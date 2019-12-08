import { IOffer } from './offer.interface';
import { IAuthority } from './authority.interface';

export interface IProject {
  id?: number;
  title?: string;
  authority?: IAuthority;
  category?: string;
  description?: string;
  skills?: string[];
  status?: string;
  offers?: IOffer[];
  selectedOffers?: IOffer[];
  datetime?: string;
  duration?: number;
  progress?: number;
}
