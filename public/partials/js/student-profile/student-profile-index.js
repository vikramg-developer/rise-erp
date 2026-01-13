import{initStudentPersonalDetails} from './student-personal-details.js';
import{initStudentAddressDetails} from './student-address-details.js';
import{initStudentParentDetails} from './student-parent-details.js';
import{initStudentEducationDetails} from './student-educational-details.js';

document.addEventListener('DOMContentLoaded',function(){
    initStudentPersonalDetails();
    initStudentAddressDetails();
     initStudentParentDetails();
    initStudentEducationDetails();
});