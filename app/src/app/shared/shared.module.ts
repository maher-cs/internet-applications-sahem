import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BackgrounAnimationComponent } from './backgroun-animation/backgroun-animation.component';
import { MatIconModule } from '@angular/material/icon';
import { MatCardModule } from '@angular/material/card';



@NgModule({
  declarations: [BackgrounAnimationComponent],
  imports: [
    CommonModule,
    MatIconModule,
    MatCardModule
  ],
  exports: [
    BackgrounAnimationComponent,
    MatIconModule,
    MatCardModule
  ]
})
export class SharedModule { }
