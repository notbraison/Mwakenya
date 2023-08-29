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
            <button type="submit" class="btn btn-success">Login</button>
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
      
        name:'LoginPage',

        data(){
      return {
        email:'',
        password:'',
        response:'',
      }
    },

    methods:{
      async login(){
       await axios.post('',
        {
         'email':this.email,
         'password':this.password
        });

      },

      async logcheck(){//check if i am logged in or not

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