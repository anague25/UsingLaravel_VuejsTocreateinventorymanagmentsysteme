<template>

  <div class="row">
    <router-link to="employees" class="btn btn-primary">All Employees</router-link>
  </div>

  <div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-12">
      <div class="card shadow-sm my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-12">
              <div class="login-form">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Add Employees</h1>
                </div>
                <form class="user" @submit.prevent="employeesInsert" enctype="multipart/form-data">

                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                          placeholder="Enter Name" v-model="form.name">
                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                      </div>

                      <div class="col-md-6">
                        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                          placeholder="Enter Email" v-model="form.email">
                        <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>

                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6 mb-2">
                        <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                          placeholder="Enter Phone" v-model="form.phone">
                        <small class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</small>

                      </div>

                      <div class="col-md-6">
                        <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                          placeholder="Enter Address" v-model="form.address">
                        <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>

                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6 mb-2">
                        <input type="date" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                          placeholder="Enter Joining Date" v-model="form.joiningDate">
                        <small class="text-danger" v-if="errors.joiningDate">{{ errors.joiningDate[0] }}</small>

                      </div>

                      <div class="col-md-6">
                        <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                          placeholder="Enter NID" v-model="form.nid">
                        <small class="text-danger" v-if="errors.nid">{{ errors.nid[0] }}</small>

                      </div>


                    </div>
                  </div>


                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                          placeholder="Enter Salary" v-model="form.salary">
                        <small class="text-danger" v-if="errors.salary">{{ errors.salary[0] }}</small>

                      </div>


                    </div>
                  </div>


                  <div class="form-group">
                    <div class="form-row">


                      <div class="col-md-6 mb-2">
                        <input type="file" class="custom-file-input" id="customFile" @change="onFileSelected">
                        <small class="text-danger" v-if="errors.image">{{ errors.image[0] }}</small>

                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>

                      <div class="col-md-6">
                        <img :src="form.imageUrl" alt="" style="width: 40px; height: 40px;">
                      </div>
                    </div>
                  </div>



                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                  </div>


                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>


<script>

import Notifications from '@/plugins/Notification';
import axios from '@/plugins/axios';


export default {
  name: 'CreateComponent',

  data() {
    return {
      form: {
        name: null,
        address: null,
        phone: null,
        email: null,
        joiningDate: null,
        nid: null,
        salary: null,
        image: null,
        imageUrl: null,

      },

      errors: {

      },
    }
  },

  methods: {

    onFileSelected(event) {
      let image = event.target.files[0];
      if (image.size > 2097540) {
        Notifications.imageValidation();
      } else {
        this.form.imageUrl = image;
        this.form.image = image;
        let reader = new FileReader();
        reader.onload = event => {
          this.form.imageUrl = event.target.result;
          console.log(event.target.result);
        }

        reader.readAsDataURL(this.form.imageUrl);
      }
    },

    employeesInsert() {

      axios.post('employees', this.form, {
        headers: {
          'Content-Type': 'multipart/form-data',
        }
      }).then(res => {
        this.errors = {};
        Notifications.success();

      }).catch(error => this.errors = error.response.data.errors)



    }

  },



}
</script>