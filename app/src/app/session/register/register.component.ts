import { Component, OnInit, OnDestroy } from '@angular/core';
import { SharedAnimations } from 'src/app/shared/animation/shared-animations';
import { FormControl, Validators, FormGroup, ValidatorFn, ValidationErrors } from '@angular/forms';
import { AuthService } from 'src/app/services/auth/auth.service';
import { ProjectService } from 'src/app/services/project.service';
import { Subscription } from 'rxjs';
import { COMMA, ENTER } from '@angular/cdk/keycodes';

const passwordMatchValidator: ValidatorFn = (formGroup: FormGroup): ValidationErrors | null => {
  if (formGroup.get('password').value === formGroup.get('c_password').value)
    return null;
  else
    return {passwordMismatch: true};
};

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.scss'],
  animations: [SharedAnimations]
})
export class RegisterComponent implements OnInit, OnDestroy {

  majors: string[];

  registerForm: FormGroup;

  first_name = new FormControl('', Validators.required);
  last_name = new FormControl('', Validators.required);
  username = new FormControl('', Validators.required);
  email = new FormControl('', [Validators.required, Validators.email]);
  major = new FormControl('', Validators.required);
  breif = new FormControl('', Validators.required);
  password = new FormControl('', Validators.required);
  c_password = new FormControl('', Validators.required);
  skills: string[] = [];

  // subscriptions
  majrosSub: Subscription;

  btnLoading = false;

  constructor(
    private authService: AuthService,
    private projectService: ProjectService
  ) { }

  buildRegisterForm() {
    this.registerForm = new FormGroup({
      first_name: this.first_name,
      last_name: this.last_name,
      username: this.username,
      email: this.email,
      major: this.major,
      breif: this.breif,
      password: this.password,
      c_password: this.c_password
    },[passwordMatchValidator]);
  }

  onPasswordInput() {
    if (this.registerForm.hasError('passwordMismatch'))
      this.c_password.setErrors([{'passwordMismatch': true}]);
    else
      this.c_password.setErrors(null);
  }

  getMajors() {
    this.majrosSub = this.projectService.getMajors().subscribe(
      majors => this.majors = majors,
    )
  }

  register() {
    this.btnLoading = true;
    let data = {
      first_name: this.first_name.value,
      last_name: this.last_name.value,
      username: this.username.value,
      email: this.email.value,
      major: this.major.value,
      breif: this.breif.value,
      password: this.password.value,
      c_password: this.c_password.value,
      skills: this.skills
    };
    this.authService.register(data).subscribe(
      res => {
        this.authService.doLoginStuff(res);
        this.btnLoading = false;
      },
      err => this.btnLoading = false
    )
  }

  ngOnInit() {
    this.buildRegisterForm();
    this.getMajors();
  }

  ngOnDestroy() {
    if(this.majrosSub) {
      this.majrosSub.unsubscribe();
    }
  }

  // skills form stuff
  readonly separatorKeysCodes: number[] = [ENTER];

  addSkill(event: MatChipInputEvent): void {
    const input = event.input;
    const value = event.value;
    // Add our skill
    if ((value || '').trim()) {
      this.skills.push(value.trim());
    }
    // Reset the input value
    if (input) {
      input.value = '';
    }
  }

  removeSkill(skill: string): void {
    const index = this.skills.indexOf(skill);
    if (index >= 0) {
      this.skills.splice(index, 1);
    }
  }

}
