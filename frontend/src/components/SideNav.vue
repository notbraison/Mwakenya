<template>

<div class="sidebar">
    <a class="navbar-brand" href="#">
      Select Criteria
    </a>
    <br>
    &nbsp;
    <select v-model="selectedGrade" class="form-select" id="floatingSelect" aria-label="Floating label select example">
      <option value="" disabled>Select a grade</option>
      <option v-for="grade in grades" :value="grade" :key="grade.id">{{ grade}}</option>
    </select>

    &nbsp;
    <select v-model="selectedSubject" class="form-select" id="floatingSelect1" aria-label="Floating label select example">
      <option value="" disabled>Select a subject</option>
      <option v-for="subject in subjects" :value="subject" :key="subject.id">{{ subject }}</option>
    </select>
    &nbsp;
    
    <br>    <br>    <br>    <br>    <br>    <br>

    <div v-if="isvideos">
      <button @click="fetchVideos">Fetch Videos</button>
    </div>
    
    <div v-if="isbooks">
       <button @click="fetchBooks">Fetch Books</button>
    </div>
   
    <br>
    
    <div v-if="isvideos">
      <router-link to="/addvideos"><button class="btn btn-outline-success">Add Video</button></router-link>
    </div>
    <br>
    <div v-if="isbooks">
      <router-link to="/addbooks"><button class="btn btn-outline-success">Add Book</button></router-link>
    </div>
    
    &nbsp;
    </div>

    <div>
        
    </div>


</template>

<script>
import axios from 'axios';

export default{
name:'SideNav',

data() {
    return {
      selectedGrade: null,
      selectedSubject: null,
      grades: [],    
      subjects: [],    

    };
  },
  mounted() {
    this.fetchgns();
  },

  methods: {
    fetchVideos() {
      // Fetch videos based on selectedGrade, selectedSubject, and selectedTopic
      // Example using axios library
      // axios.get(`/api/videos?grade=${this.selectedGrade}&subject=${this.selectedSubject}&topic=${this.selectedTopic}`)
      //   .then(response => {
      //     // Update videos list in your main component
      //   })
      //   .catch(error => {
      //     // Handle error
      //   });
    },
    fetchBooks() {
      // Fetch videos based on selectedGrade, selectedSubject, and selectedTopic
      // Example using axios library
      // axios.get(`/api/videos?grade=${this.selectedGrade}&subject=${this.selectedSubject}&topic=${this.selectedTopic}`)
      //   .then(response => {
      //     // Update videos list in your main component
      //   })
      //   .catch(error => {
      //     // Handle error
      //   });
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
  watch: {
    
    selectedSubject() {
      // Fetch topics based on selectedSubject
      // Update this.topics based on the API response
    }
  },
  computed:{
isbooks(){
  return this.$route.path==='/books';
},
isvideos(){
  return this.$route.path==='/videos';
}
  }


};

</script>

<style>
.sidebar{
height: 100%; /* 100% Full-height */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 7%; /* Stay at the top */
  left: 0;

  padding-top: 60px; /* Place content 60px from the top */
}
</style>