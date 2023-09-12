<template>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../assets/elearning.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Mwakenya
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <router-link to="/" class="nav-link active">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/register" class="nav-link active">Register</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/login" class="nav-link active">Login</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/videos" class="nav-link active">Videos</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/books" class="nav-link active">Books</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/revision" class="nav-link active">Compete</router-link>
        </li>       
        <li class="nav-item">
          <router-link to="/logout" class="nav-link active">logout</router-link>
        </li>       
      </ul>

      
    </div>
  </div>
</nav>

</template>

<script>
export default{
name:'NavBar'

}
</script>

<style>
.navbar{
  position: fixed; /* //Position the navbar relative to the viewport  */
  top: 0; /* // Position it at the top  */
  left: 0; /* // Position it at the left  */
  width: 100%; /* // Make it span the entire width  */
  height:50px;
  padding: 10px;
}

</style>