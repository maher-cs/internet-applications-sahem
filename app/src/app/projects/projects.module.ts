import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ProjectsRoutingModule } from './projects-routing.module';
import { SharedModule } from '../shared/shared.module';
import { ProjectsListComponent } from './projects-list/projects-list.component';
import { ProjectItemComponent } from './project-item/project-item.component';
import { NewProjectComponent } from './new-project/new-project.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';


@NgModule({
  declarations: [ProjectsListComponent, ProjectItemComponent, NewProjectComponent],
  imports: [
    CommonModule,
    ProjectsRoutingModule,
    SharedModule,
    FormsModule,
    ReactiveFormsModule
  ]
})
export class ProjectsModule { }
