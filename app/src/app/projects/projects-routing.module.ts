import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ProjectsListComponent } from './projects-list/projects-list.component';
import { NewProjectComponent } from './new-project/new-project.component';


const routes: Routes = [
  {
    path: 'list',
    component: ProjectsListComponent
  },
  {
    path: 'new',
    component: NewProjectComponent
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProjectsRoutingModule { }
