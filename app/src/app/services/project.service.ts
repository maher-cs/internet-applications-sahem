import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError, tap, map } from 'rxjs/operators';

// import  {api}  from './api';

import { IProject } from '../models/project.interface';
import { ICategory } from '../models/category.interface';

const api = {
  projectsUrl: "../../assets/fake-data/projects-list.json",
  categoriesUrl: "../../assets/fake-data/categories.json"
};

@Injectable({
  providedIn: 'root'
})
export class ProjectService {
  
  constructor(private http: HttpClient) { }

  getProjects(): Observable<IProject[]> {
    return this.http.get<IProject[]>(api.projectsUrl)
      .pipe(
        catchError(this.handleError)
      );
  }

  getCategories(): Observable<ICategory[]> {
      return this.http.get<ICategory[]>(api.categoriesUrl)
        .pipe(
            catchError(this.handleError)
        )
  }

  createProject() {
    
  }

  private handleError(err: HttpErrorResponse) {
    let errorMessage = '';
    if (err.error instanceof ErrorEvent) {
      errorMessage = `An error occurred: ${err.error.message}`;
    } else {
      errorMessage = `Server returned code: ${err.status}, error message is: ${err.message}`;
    }
    console.error(errorMessage);
    return throwError(errorMessage);
  }

}