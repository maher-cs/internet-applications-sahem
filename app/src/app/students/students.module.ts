import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { StudentsRoutingModule } from './students-routing.module';
import { SharedModule } from '../shared/shared.module';
import { StudentDetailsComponent } from './student-details/student-details.component';
import { HttpClientModule } from '@angular/common/http';


@NgModule({
  declarations: [StudentDetailsComponent],
  imports: [
    CommonModule,
    StudentsRoutingModule,
    HttpClientModule,
    SharedModule
  ]
})
export class StudentsModule { }
