import { Injectable } from '@angular/core';

//Object to mask the key-value pair of (isAuthority, 1)
//to store it in localstorage and to be unknown to the user
const cryptoRandom = {
  isStudent: 'nflqopds',
  one: 'mpajxngs',
  zero: Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 10)
}

@Injectable({
  providedIn: 'root'
})
export class AuthStudentService {

  constructor() { }

  handle(user) {
    this.setRole(user);
  }

  setRole(user) {
    let value = user.role == 2 ? cryptoRandom.one : cryptoRandom.zero;
    localStorage.setItem(cryptoRandom.isStudent, value);
  }

  get() {
    return localStorage.getItem(cryptoRandom.isStudent);
  }

  remove() {
    localStorage.removeItem(cryptoRandom.isStudent);
  }

  isStudent() {
    const role = this.get();
    if (role && role == cryptoRandom.one) {
      return true;
    }
    return false;
  }

}
