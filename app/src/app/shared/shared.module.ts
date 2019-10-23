import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BackgrounAnimationComponent } from './backgroun-animation/backgroun-animation.component';
import { MatIconModule } from '@angular/material/icon';



@NgModule({
  declarations: [BackgrounAnimationComponent],
  imports: [
    CommonModule,
    MatIconModule
  ],
  exports: [
    BackgrounAnimationComponent,
    MatIconModule
  ]
})
export class SharedModule { }
