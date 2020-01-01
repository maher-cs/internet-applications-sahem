import { Component, OnInit } from '@angular/core';
import { SharedAnimations } from 'src/app/shared/animation/shared-animations';
import { Router } from '@angular/router';

@Component({
  selector: 'app-session',
  templateUrl: './session.component.html',
  styleUrls: ['./session.component.scss'],
  animations: [SharedAnimations]
})
export class SessionComponent implements OnInit {

  activeLink: string;

  constructor(private router: Router) { }

  getActiveLink() {
    this.activeLink = this.router.url;
  }

  ngOnInit() {
    this.getActiveLink();
  }

}
