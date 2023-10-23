<template>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Grade</th>
      <th scope="col">subject</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">1</th>
      <td>{{title}}</td>
      <td>{{ grade }}</td>
      <td> {{ subject }}</td>
    </tr>

    <tr>
      <th scope="row">2</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    

  </tbody>
</table>

</template>

<script>

export default{
name:'BookView',




}



</script>

<style>
.card{
    height:50px;
    width:50px;
}

</style>