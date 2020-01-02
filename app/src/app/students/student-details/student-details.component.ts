import { Component, OnInit } from '@angular/core';
import { StudentService } from '../../services/student.service';
import { IStudent } from 'src/app/models/student.interface';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-student-details',
  templateUrl: './student-details.component.html',
  styleUrls: ['./student-details.component.scss']
})
export class StudentDetailsComponent implements OnInit {

  student: IStudent;

  constructor(
    private studentService: StudentService,
    private route: ActivatedRoute
  ) { }

  getStudent() {
    const id: number = this.route.snapshot.params.id;
    const student: IStudent = {
      id: id
    };
    this.studentService.getStudent(student).subscribe(
      student => this.student = student
    )
  }

  ngOnInit() {
    this.getStudent();
  }

}
