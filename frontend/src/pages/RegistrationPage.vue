<template>

<div class="registrationform">
    <form @submit.prevent="register" id="registrationform">

  <div class="card">

  <div class="card-body">
    <h5 class="card-title">User Registration</h5><br>

    <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" placeholder="name" v-model="name" required>
    </div>

    <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="name@example.com" v-model="email" required>
    </div>

    <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" placeholder="password" v-model="password" required>
    </div>

    <div class="btn-container">
        <button type="submit" class="btn btn-success">Register</button>
        &nbsp;&nbsp;
        <button type="reset" class="btn btn-warning">Reset</button>
    </div>
</div>
  </div>

    </form>
</div>

</template>

<script>
import axios from 'axios';
export default{
    name:'RegistrationPage',
    components:{
      
    },
    data(){
      return {
        name:'',
        email:'',
        password:'',
      }
    },

    methods:{
      async register(){
       await axios.post('http://127.0.0.1:8000/api/users',
        {
        'name':this.name,
         'email':this.email,
         'password':this.password
        });

      }
    }

}

</script>

<style>
*{
      background-color: white;
    }
    .btn-container{
        padding:10px;
        
    }
    h5{
      text-align: center;
    }
    .registrationform{
      height: 600px;
      width: 1200px;
      margin-top:10%;
   
    }
    .card{
      display: flex;
  justify-content: center;
  align-items: center;
  width:auto;
  height: auto;
    }
    .form-control{
      width:  450px;
    }
</style>