import { Component, OnInit } from '@angular/core';
import { SharedAnimations } from 'src/app/shared/animation/shared-animations';
import { Validators, FormControl, FormGroup } from '@angular/forms';
import { AuthService } from 'src/app/services/auth/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
  animations: [SharedAnimations]
})
export class LoginComponent implements OnInit {

  loginForm: FormGroup;
  email = new FormControl('', [Validators.required, Validators.email]);
  password = new FormControl('', [Validators.required]);

  btnLoading = false;

  constructor(
    private authService: AuthService
  ) { }

  login() {
    this.btnLoading = true;
    let data = {
      email: this.email.value,
      password: this.password.value
    }
    this.authService.login(data).subscribe(
      res => {
        this.authService.doLoginStuff(res);
        this.btnLoading = false;
      },
      err => {
        this.btnLoading = false;
      }
    )
  }

  buildLoginForm() {
    this.loginForm = new FormGroup({
      email: this.email,
      password: this.password
    });
  }

  ngOnInit() {
    this.buildLoginForm();
  }

}
