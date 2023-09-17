<template>
  
    
  <div class="card" >
  <div class="card-body">
    
    <ul>
      <li><router-link to="/" class="card-link">Home</router-link></li>
      <li><router-link to="/courses" class="card-link">Courses</router-link></li>
      <li><router-link to="/about" class="card-link">About Us</router-link></li>
      <li><router-link to="/contact" class="card-link">Contact</router-link></li>
    </ul>
  </div>
  <div class="footercontact">
    <h3>Contact Us</h3>
    <ul class="list-group list-group-flush">
      <p class="list-group-item">Email: orinabraison@gmail.com</p>
      <p class="list-group-item">Phone: +254 123456789</p>
      <p class="list-group-item">Address: Nairobi, Kenya</p>
    </ul>
  </div>
</div>

       
</template>

<script>
export default {
  name: 'Footer',
}
</script>

<style scoped>



.container {
  max-width: 800px;
  margin: 0 auto;
}

.footer-content {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}


.footer-links ul {
  list-style: none;
  padding: 0;
}

.footer-links li {
  margin-bottom: 10px;
  color: rgb(0,276,0  );
}

.footer-links a {
  color: #fff;
  text-decoration: none;
  transition: color 0.3s;
}

.footer-links a:hover {
  color: #00bcd4;
}

.footer-contact h3 {
  margin-top: 20px;
}

#footimg{
  height: 50px;
  width:50px;
}

</style>
