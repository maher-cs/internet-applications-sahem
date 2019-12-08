import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BackgrounAnimationComponent } from './backgroun-animation/backgroun-animation.component';
import { MatIconModule } from '@angular/material/icon';
import { MatCardModule } from '@angular/material/card';
import { MatFormFieldModule } from '@angular/material/form-field'; 
import { MatInputModule } from '@angular/material/input';
import { MatChipsModule } from '@angular/material/chips';
import { MatDatepickerModule } from '@angular/material/datepicker'; 
import { MatNativeDateModule } from '@angular/material';
import { MatSelectModule } from '@angular/material/select'; 

@NgModule({
  declarations: [BackgrounAnimationComponent],
  imports: [
    CommonModule,
    MatIconModule,
    MatCardModule,
    MatFormFieldModule,
    MatInputModule,
    MatChipsModule,
    MatDatepickerModule,
    MatNativeDateModule,
    MatSelectModule
  ],
  exports: [
    BackgrounAnimationComponent,
    MatIconModule,
    MatCardModule,
    MatFormFieldModule,
    MatInputModule,
    MatChipsModule,
    MatDatepickerModule,
    MatNativeDateModule,
    MatSelectModule
  ],
  providers: [
    MatDatepickerModule
  ]
})
export class SharedModule { }
