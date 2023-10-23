<template>
  <div class="form-group" >
      <form @submit.prevent="uploadVideo" id="videoform" enctype="multipart/form-data"  >

      <h2> Upload Video </h2>

      <br />

      <input type="file" @change="handleFileChange" accept="video/*" name="video">
      <br /><br />

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name of video" v-model="name" required>
      </div>

      <label for="grade" class="form-label" >Grade</label>
      <select v-model="selectedGrade" class="form-select" id="floatingSelect" aria-label="Floating label select example">
      <option value="" disabled>Select a grade</option>
      <option v-for="grade in grades" :value="grade" :key="grade.id">{{ grade}}</option>
      <option value="customgrade">Custom Grade</option>
    </select>
    <br>
    <input v-if="selectedGrade === 'customgrade'" class="input-group-text" v-model="customgrade" placeholder="Enter custom grade">

      <label for="subject" class="form-label">Subject</label>
      <select v-model="selectedSubject" class="form-select" id="floatingSelect1" aria-label="Floating label select example">
      <option value="" disabled>Select a subject</option>
      <option v-for="subject in subjects" :value="subject" :key="subject.id">{{ subject }}</option>
      <option value="customsubject">Custom Subject</option>
    </select>
    <br>
      <input v-if="selectedSubject === 'customsubject'" class="input-group-text" v-model="customsubject" placeholder="Enter custom subject">
  
      <div class="mb-3">
        <label for="topic" class="form-label">Topic</label>
        <input type="text" class="form-control" id="topic" placeholder="topic of video" v-model="selectedTopic" required>
      </div>
     
      <br /><br />
      <div>
        <button type="submit" class="btn btn-outline-success btn-lg">Upload</button>
      </div>
    </form>
  </div>
</template>

<script>
import { ref} from "vue";
import axios from 'axios';

export default {
  name: 'AddVideos',
  data() {
    return {
      name: '',
      customgrade: '',
      customsubject: '',
      video : ref(null),
      selectedGrade: null,
 selectedSubject: null,
 selectedTopic: null,
grades: [],    
subjects: [],


    };
  },
  mounted() {
    this.fetchgns();
  },

  methods: {
    extractNameFromFileName(event) {
      // Extract name from the uploaded file name
      const fileName = event.target.files[0].name;
      const fileExtension = fileName.split('.').pop(); // Get the file extension
      const name = fileName.replace(`.${fileExtension}`, ''); // Remove extension
      this.name = name;
    },
    handleFileChange(event) {
      // Store the selected file for uploading
      this.extractNameFromFileName(event);
      this.video = event.target.files[0];
    },

    async fetchgns() {
    try {
      const response = await axios.get('http://127.0.0.1:8000/api/grade');
      const response2 = await axios.get('http://127.0.0.1:8000/api/subject');
      this.grades = response.data;
      this.subjects = response2.data;

 console.log(response,response2)
    } catch (error) {
      console.error('Error fetching grades:', error);
    }
  },

      async uploadVideo() {

        if (this.selectedGrade === null) {
        this.selectedGrade = this.customgrade;
      }
      if (this.selectedSubject === null) {
        this.selectedSubject = this.customsubject;
      } 

      /* console.log("this.video:", this.video);
console.log("this.name:", this.name);
console.log("this.selectedGrade:", this.selectedGrade);
console.log("this.selectedSubject:", this.selectedSubject);
console.log("this.selectedTopic:", this.selectedTopic); */

      const datam = new FormData(); // Use FormData for file uploads
      
    datam.append("video", this.video);
    datam.append("name", this.name);
    datam.append("grade", this.selectedGrade);
    datam.append("subject", this.selectedSubject);
    datam.append("topic", this.selectedTopic);

    console.log("FormData:", datam);


      try {
        const endpoint = 'http://127.0.0.1:8000/api/videos';
        const  res = await axios.post(endpoint,datam,{
      headers: {
        'Content-Type': 'multipart/form-data', // Set the content type for file upload
      },
    });
      debugger

        console.log(res.data);

        
        console.log('Video uploaded successfully!', this.name); 
        alert('Video uploaded successfully', this.name);
      } catch (error) {
        console.error('Error uploading video:', error);
      }
    },
    
    
  },
};
</script>

<style>
.form-group {
  top: 5%;
}
</style>
