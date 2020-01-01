import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SessionRoutingModule } from './session-routing.module';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { SessionComponent } from './session/session.component';
import { SharedModule } from '../shared/shared.module';
import { ReactiveFormsModule } from '@angular/forms';


@NgModule({
  declarations: [LoginComponent, RegisterComponent, SessionComponent],
  imports: [
    CommonModule,
    SessionRoutingModule,
    ReactiveFormsModule,
    SharedModule
  ]
})
export class SessionModule { }
