import { Component, OnInit } from '@angular/core';
import { IProject } from 'src/app/models/project.interface';
import { SharedAnimations } from 'src/app/shared/animation/shared-animations';
import { ProjectService } from 'src/app/services/project.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-projects-list',
  templateUrl: './projects-list.component.html',
  styleUrls: ['./projects-list.component.scss'],
  animations: [SharedAnimations]
})
export class ProjectsListComponent implements OnInit {

  projects$: Observable<IProject[]>;

  constructor(private projectService: ProjectService) { }

  getProjects() {
    const projectsList$ = this.projectService.getProjects();
    this.projects$ = projectsList$;
    return projectsList$;
  }

  ngOnInit() {
    this.getProjects();
  }

}
