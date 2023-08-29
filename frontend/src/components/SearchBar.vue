<template>

      <div class="input-group" id="searchbar">
        <form class="d-flex" role="search">
          <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>

</template>

<script>
export default{
    name:'SearchBar'
}
</script>

<style>
#searchbar{
  position: fixed;
  top: 60px; /* Position the input group 60px below the navbar */
  width: 50%;
  height: 50px;
  padding: 10px;
  left:25%;
}

</style>