//i use vue3-toastify
import {toast} from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';


class Notifications {
 
 
  success(){

  toast.success('Successfully Done',{
    autoClose:1000,
  });
  
 }

  error(){

  toast.error('Something Went Wrong',{
    autoClose:1000,
  });

 }

 warning(){

  toast.warn('Opps Wrong',{
    autoClose:1000,
  });

 }


  alert(){

  toast.warning('Are You Sure ?',{
    autoClose:1000,
  });

 }


  imageValidation(){

  toast.error('Upload image less then 1Mb',{
    autoClose:1000,
  });

 }


}

export default Notifications = new Notifications();
