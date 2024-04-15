<template>
  <div class="row">
<router-link to="employees-create" class="btn btn-primary">Add Employees</router-link>
</div>

    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">All Employees</h1>
                  </div>
                

<hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</template>

<script>
export default {
  name: 'ListComponent',

  data(){
    return {
      form : {
        name:null,
        address:null,
        phone:null,
        email:null,
        joiningDate:null,
        nid:null,
        salary:null,
        image:null,
        
      },

      errors:{
       
      },
    }
  },

  methods:{

    employeesInsert(){

    }

  }
}



</script>