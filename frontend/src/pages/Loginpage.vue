<template>

    <div class="loginform">
        <form @submit.prevent="login" id="loginform">
    
      <div class="card">
        <!-- w-50 column-12 -->
    
      <div class="card-body">
        <h5 class="card-title">User Login</h5><br>
    
        <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com" v-model="email" required>
        </div>
    
        <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="password" v-model="password" required>
        </div>
    
        <div class="btn-container">
            <button type="submit" class="btn btn-success" form="loginform">Login</button>
            &nbsp;&nbsp;
            <button type="reset" class="btn btn-warning" form="loginform">Reset</button>
        </div>
      </div>
      </div>
    
        </form>
    </div>
    
    </template>
    
    <script>
    import axios from 'axios';
    

    export default{
      
        name:'LoginPage',

        data(){
      return {
        email:'',
        password:'',
        response:'',
        headers:''
      }
    },

    methods:{
      async login() {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/login', {
      email: this.email,
      password: this.password,
    });

    // Assuming your API returns a token upon successful login
    const token = response.data.token;

    // Store the token in Vuex
    //this.$store.commit('setToken', token);

    // Redirect to the 'Home' route
    this.$router.push({ name: 'Home' });
  } catch (error) {
    console.log(error);
  }
},
/* 
//this code shows how to use tokens
async fetchData() {
  try {
    // Include the token in the headers
    const response = await axios.get('http://127.0.0.1:8000/api/data', {
      headers: {
        Authorization: `Bearer ${this.$store.state.token}`,
      },
    });

    // Handle the response data here
  } catch (error) {
    console.error(error);
  }
},

*/


      async logcheck(){//check if i am logged in or not
      },
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
    .loginform{
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