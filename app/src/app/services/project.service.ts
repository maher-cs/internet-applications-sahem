import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

import  {api}  from './api';

import { IProject } from '../models/project.interface';
import { IOffer } from '../models/offer.interface';
import { stringify } from 'querystring';

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

  getProject(id: number): Observable<IProject> {
    return this.http.get<IProject>(`${api.projectDetUrl}${id}`)
      .pipe(
        catchError(this.handleError)
      );
  }

  getCategories(): Observable<string[]> {
      return this.http.get<string[]>(api.categoriesUrl)
        .pipe(
            catchError(this.handleError)
        )
  }

  createProject(project: IProject) {
    return this.http.post<{project:IProject}>(api.newProjectUrl, project)
        .pipe(
            catchError(this.handleError)
        )
  }

  createOffer(offer: IOffer) {
    return this.http.post<{offer: IOffer}>(api.newOfferUrl, offer)
        .pipe(
          catchError(this.handleError)
        )
  }

  acceptOffer(offer: IOffer) {
    return this.http.post<{message:string;offer?:IOffer}>(api.acceptOfferUrl, offer)
        .pipe(
          catchError(this.handleError)
        )
  }

  getMajors() {
    return this.http.get<string[]>(api.majorsUrl)
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