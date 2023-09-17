<template>

<div class="card-container">

  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>



<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

</div>

</template>

<script>
export default{
    name:'Header',
    
}

</script>

<style>
.card-container {
  display: flex;
  overflow-x: auto; /* Enable horizontal scrolling */
  white-space: nowrap; /* Prevent cards from wrapping to the next line */
}

.card {
  margin-right: 30px; /* Increase or decrease this value to adjust spacing */
  margin-left: 30px; /* Increase or decrease this value to adjust spacing */
  
}

.card-body p {
  white-space: nowrap; /* Prevent text from wrapping */
  overflow: hidden; /* Hide any overflow */
  text-overflow: ellipsis;/* Add ellipsis (...) to indicate truncated text */
}


</style>
