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
    </div>&nbsp;

    <div class="mb-3">
    <label for="password confirmation" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" placeholder="password" v-model="password_confirmation" required>
    </div>&nbsp;

    <div class="mb-3">
    <label for="age" class="form-label">Age</label>
    <input type="text" class="form-control" id="age" placeholder="e.g 13" v-model="age" required>
    </div>&nbsp;

 <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">User</label>
  <select class="form-select" id="inputGroupSelect01" v-model="usertype" required>
    <option value="student">Student</option>//these should be lowercase
    <option value="parent">Parent</option>
    <option value="teacher">Teacher</option>
  </select>
</div>&nbsp;

<div class="mb-3" v-if="usertype==='student'">
    <label  for="grade" class="form-label">Grade</label>
    <select v-model="grade"  class="form-select" id="grade" aria-label="Floating label select example">
      <option v-for="grade in grades" :value="grade" :key="grade.id">{{ grade}}</option>
    </select>
    </div>&nbsp;

   

<div class="input-group mb-3" v-if="usertype==='student'">
    <label  for="gender" class="input-group-text">gender</label>
    <select class="form-select" id="gender"  v-model="gender" required>
<option value="1">Male</option>
<option value="2">Female</option>
</select>
    </div>&nbsp;

    <div class="btn-container">
        <button type="submit" class="btn btn-success" form="registrationform">Register</button>
        &nbsp;&nbsp;
        <button type="reset" class="btn btn-warning" form="registrationform">Reset</button>
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
        password_confirmation:'',
        age:'',
        grade:'',
        /* usertype: '1', */
        gender:'',
        grades: [],
        usertype:'Student',
      }
    },

    methods:{
      async register(){
       await axios.post('http://127.0.0.1:8000/api/register',
        {
        'name':this.name,
         'email':this.email,
         'password':this.password,
         'password_confirmation':this.password_confirmation,
         'age':this.age,
         'grade':this.grade,
         'gender':this.gender,
         'usertype':this.usertype
        });

      },
      async fetchgns() {
    try {
      const response = await axios.get('http://127.0.0.1:8000/api/grade');
      const response2 = await axios.get('http://127.0.0.1:8000/api/subject');
      this.grades = response.data;
      this.subjects = response2.data;
 
    } catch (error) {
      console.error('Error fetching grades:', error);
    }
  }, 
    },
    mounted() {
    this.fetchgns();
  },

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