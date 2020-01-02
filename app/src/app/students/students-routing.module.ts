import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { StudentDetailsComponent } from './student-details/student-details.component';


const routes: Routes = [
  {
    path: ':id',
    component: StudentDetailsComponent
  },
  {
    path: '',
    redirectTo: '/home'
  },
  {
    path: '*',
    redirectTo: '/home'
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class StudentsRoutingModule { }
