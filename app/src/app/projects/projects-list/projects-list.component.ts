import { Component, OnInit } from '@angular/core';
import { IProject } from 'src/app/models/project.interface';
import { IAuthority } from 'src/app/models/authority.interface';
import { IOffer } from 'src/app/models/offer.interface';
import { SharedAnimations } from 'src/app/shared/animation/shared-animations';

let projectsList: IProject[];
let offersList: IOffer[];


let cis: IAuthority = {
  id: 1,
  name: 'كلية الحاسب الآلي و نظم المعلومات',
  projects: null
};

let science: IAuthority = {
  id: 2,
  name: 'كلية العلوم التطبيقية',
  projects: null
};

projectsList = [
  {
    title: 'المشروع الأول',
    id: 1,
    authority: science,
    class: 'تطوير برمجيات',
    date: '05-09-2019',
    description: 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
    offers: offersList,
    selectedOffer: null,
    skills: ['Java', 'Angular', 'git'],
    state: 'recieving'
  },
  {
    title: 'المشروع الأول',
    id: 1,
    authority: cis,
    class: 'تطوير برمجيات',
    date: '05-09-2019',
    description: 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
    offers: offersList,
    selectedOffer: null,
    skills: ['Java', 'Angular', 'git'],
    state: 'recieving'
  },
  {
    title: 'المشروع الأول',
    id: 1,
    authority: science,
    class: 'تطوير برمجيات',
    date: '05-09-2019',
    description: 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
    offers: offersList,
    selectedOffer: null,
    skills: ['Java', 'Angular', 'git'],
    state: 'recieving'
  },
  {
    title: 'المشروع الأول',
    id: 1,
    authority: cis,
    class: 'تطوير برمجيات',
    date: '05-09-2019',
    description: 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
    offers: offersList,
    selectedOffer: null,
    skills: ['Java', 'Angular', 'git'],
    state: 'recieving'
  },
  {
    title: 'المشروع الأول',
    id: 1,
    authority: cis,
    class: 'تطوير برمجيات',
    date: '05-09-2019',
    description: 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة',
    offers: offersList,
    selectedOffer: null,
    skills: ['Java', 'Angular', 'git'],
    state: 'recieving'
  }
];

@Component({
  selector: 'app-projects-list',
  templateUrl: './projects-list.component.html',
  styleUrls: ['./projects-list.component.scss'],
  animations: [SharedAnimations]
})
export class ProjectsListComponent implements OnInit {

  projects: IProject[];

  constructor() { }

  ngOnInit() {
    this.projects = projectsList;
  }

}
