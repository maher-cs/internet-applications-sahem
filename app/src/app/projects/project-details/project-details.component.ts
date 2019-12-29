import { Component, OnInit } from '@angular/core';
import { SharedAnimations } from 'src/app/shared/animation/shared-animations';
import { ProjectService } from 'src/app/services/project.service';
import { Observable } from 'rxjs';
import { IProject } from 'src/app/models/project.interface';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-project-details',
  templateUrl: './project-details.component.html',
  styleUrls: ['./project-details.component.scss'],
  animations: [SharedAnimations]
})
export class ProjectDetailsComponent implements OnInit {

  project$: Observable<IProject>;

  constructor(
    private projectsService: ProjectService,
    private route: ActivatedRoute
  ) { }

  ngOnInit() {
    this.getProject();
  }

  getProject(): void {
    const projectId = this.route.snapshot.params.id;
    this.project$ = this.projectsService.getProject(projectId);
  }

}
