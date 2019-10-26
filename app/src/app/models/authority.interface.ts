import { IProject } from './project.interface';

export interface IAuthority {
  id: number;
  name: string;
  projects: IProject[];
}
