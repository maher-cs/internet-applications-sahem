import { Component, OnInit } from '@angular/core';
import { SharedAnimations } from 'src/app/shared/animation/shared-animations';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss'],
  animations: [SharedAnimations]
})
export class RegisterComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}
