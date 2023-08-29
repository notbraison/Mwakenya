<template>

<div class="sidebar">
    <a class="navbar-brand" href="#">
      Select Criteria
    </a>
    <br>
    <br>
    <br>
    &nbsp;
    <select v-model="selectedGrade">
      <option v-for="grade in grades" :value="grade.id" :key="grade.id">{{ grade.name }}</option>
    </select>
    &nbsp;
    <select v-model="selectedSubject">
      <option v-for="subject in subjects" :value="subject.id" :key="subject.id">{{ subject.name }}</option>
    </select>
    &nbsp;
    <select v-model="selectedTopic">
      <option v-for="topic in topics" :value="topic.id" :key="topic.id">{{ topic.name }}</option>
    </select>
    <br>    <br>    <br>    <br>    <br>    <br>
    <button @click="fetchVideos">Fetch Videos</button>
    <br><br>
    <router-link to="/addvideos"><button>Add Video</button></router-link>
    &nbsp;
    </div>

    <div>
        
    </div>


</template>

<script>

export default{
name:'SideNav',

data() {
    return {
      selectedGrade: null,
      selectedSubject: null,
      selectedTopic: null,
      grades: [],     // Populate this from API response
      subjects: [],   // Populate this from API response based on selectedGrade
      topics: [],     // Populate this from API response based on selectedSubject
    };
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
    }
  },
  watch: {
    selectedGrade() {
      // Fetch subjects based on selectedGrade
      // Update this.subjects based on the API response
    },
    selectedSubject() {
      // Fetch topics based on selectedSubject
      // Update this.topics based on the API response
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