import { Component, OnInit, OnDestroy } from '@angular/core';
import { FormControl, Validators } from '@angular/forms';
import { SharedAnimations } from 'src/app/shared/animation/shared-animations';
import { COMMA, ENTER } from '@angular/cdk/keycodes';
import { MatChipInputEvent } from '@angular/material';
import { ICategory } from 'src/app/models/category.interface';
import { ProjectService } from 'src/app/services/project.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-new-project',
  templateUrl: './new-project.component.html',
  styleUrls: ['./new-project.component.scss'],
  animations: [SharedAnimations]
})
export class NewProjectComponent implements OnInit, OnDestroy {

  title = new FormControl('', [Validators.required]);
  description = new FormControl('', [Validators.required, Validators.minLength(100)]);
  deliveryDate = new FormControl('', [Validators.required]);
  category = new FormControl('', [Validators.required]);
  skills: string[] = [];
  categories: ICategory[] = [];

  // subscriptions
  categoriesSubscription: Subscription;
  skillsSubscription: Subscription;

  constructor(private projectService: ProjectService) { }

  ngOnInit() {
    this.categoriesSubscription = this.getCategories();
  }

  ngOnDestroy() {
    this.categoriesSubscription.unsubscribe();
  }

  // description form stuff
  getDescriptionErrorMessage() {
    if(this.description.hasError('required')) {
      return 'وصف المشروع ضروري لإكمال الطلب';
    }
    return 'الوصف الذي أدخلته غير كافٍ';
  }

  // categories form stuff
  getCategories() {
    return this.projectService.getCategories().subscribe(
      categories => this.categories = categories
    );
  }

  // skills form stuff
  readonly separatorKeysCodes: number[] = [ENTER, COMMA];

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

  // date form stuff
  minDate = new Date();
}
