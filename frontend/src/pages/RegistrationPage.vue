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
    <label for="age" class="form-label">Age</label>
    <input type="text" class="form-control" id="age" placeholder="e.g 13" v-model="age" required>
    </div>&nbsp;

 <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">User</label>
  <select class="form-select" id="inputGroupSelect01" v-model="selectedOption" required>

    <option value="1">Student</option>
    <option value="2">parent</option>
    <option value="3">Teacher</option>
  </select>
</div>&nbsp;

<div class="mb-3" v-if="selectedOption==='1'">
    <label  for="grade" class="form-label">Grade</label>
    <input type="text" class="form-control" id="grade" placeholder="e.g 6" v-model="grade" required>
    </div>&nbsp;

<div class="input-group mb-3" v-if="selectedOption==='1'">
    <label  for="gender" class="input-group-text">gender</label>
    <select class="form-select" id="gender"  v-model="gender" required>
<option value="1">Male</option>
<option value="2">Female</option>
</select>
    </div>&nbsp;

    <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" placeholder="password" v-model="password" required>
    </div>&nbsp;


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
        age:'',
        grade:'',
        selectedOption: '1',
        gender:''
      }
    },

    methods:{
      async register(){
       await axios.post('',
        {
        'name':this.name,
         'email':this.email,
         'password':this.password,
         'age':this.age,
         'grade':this.grade,
         'gender':this.gender,
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
      height: 900px;
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