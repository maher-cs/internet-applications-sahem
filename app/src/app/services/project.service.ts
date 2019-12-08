import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError, tap, map } from 'rxjs/operators';

import { IProject } from '../models/project.interface';
import { ICategory } from '../models/category.interface';

@Injectable({
  providedIn: 'root'
})
export class ProjectService {

  private projectsUrl = '../../assets/fake-data/projects-list.json';
  private categoriesUrl = '../../assets/fake-data/categories.json';
  
  constructor(private http: HttpClient) { }

  getProjects(): Observable<IProject[]> {
    return this.http.get<IProject[]>(this.projectsUrl)
      .pipe(
        catchError(this.handleError)
      );
  }

  getCategories(): Observable<ICategory[]> {
      return this.http.get<ICategory[]>(this.categoriesUrl)
        .pipe(
            catchError(this.handleError)
        )
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