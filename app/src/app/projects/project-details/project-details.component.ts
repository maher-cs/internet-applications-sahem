import { Component, OnInit, OnDestroy } from '@angular/core';
import { SharedAnimations } from 'src/app/shared/animation/shared-animations';
import { ProjectService } from 'src/app/services/project.service';
import { Observable, Subscription } from 'rxjs';
import { IProject } from 'src/app/models/project.interface';
import { ActivatedRoute } from '@angular/router';
import { BreakpointObserver, Breakpoints } from '@angular/cdk/layout';
import { shareReplay, map } from 'rxjs/operators';
import { FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-project-details',
  templateUrl: './project-details.component.html',
  styleUrls: ['./project-details.component.scss'],
  animations: [SharedAnimations]
})
export class ProjectDetailsComponent implements OnInit, OnDestroy {

  // project information
  private projectSubscription: Subscription;
  project: IProject;

  // new offer form
  description = new FormControl('', [Validators.required, Validators.minLength(50)]);

  // new offer animation state
  btnLoading = false;

  isHandset$: Observable<boolean> = this.breakpointObserver.observe(Breakpoints.Handset)
    .pipe(
      map(result => result.matches),
      shareReplay()
    );

  constructor(
    private projectsService: ProjectService,
    private route: ActivatedRoute,
    private breakpointObserver: BreakpointObserver
  ) { }

  ngOnInit() {
    this.projectSubscription = this.getProject();
  }

  ngOnDestroy() {
    this.projectSubscription.unsubscribe();
  }

  getProject(): Subscription {
    const projectId = this.route.snapshot.params.id;
    return this.projectsService.getProject(projectId).subscribe(
      project => this.project = project
    );
  }

  createOffer() {
    this.btnLoading = true;
  }

}
