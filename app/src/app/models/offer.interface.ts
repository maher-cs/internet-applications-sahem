import { IProject } from './project.interface';
import { IStudent } from './student.interface';
import { IAuthority } from './authority.interface';
import { IRate } from './rate.interface';

export interface IOffer {
  id?: number;
  project?: IProject;
  students?: IStudent;
  descirption?: string;
  status?: string;
  rate?: IRate[];
  datetime?: string;
}
