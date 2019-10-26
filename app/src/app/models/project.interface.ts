import { IOffer } from './offer.interface';
import { IAuthority } from './authority.interface';

export interface IProject {
  id: number;
  title: string;
  authority: IAuthority;
  class: string;
  description: string;
  skills: string[];
  state: string;
  offers: IOffer[];
  selectedOffer: IOffer;
  date: string;
}
