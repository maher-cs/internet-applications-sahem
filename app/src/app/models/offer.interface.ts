import { IProject } from './project.interface';
import { IStudent } from './student.interface';

export interface IOffer {
  id: number;
  project: IProject;
  students: IStudent;
  descirption: string;
}
