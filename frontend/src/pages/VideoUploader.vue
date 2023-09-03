<template>
  <div class="form-group">
      <form @submit.prevent="uploadVideo" id="videoform" enctype="multipart/form-data" >

      <h2>Upload Video</h2>
      <br />

      <input type="file" @change="handleFileChange" accept="video/*">
      <br /><br />

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name of video" v-model="name" required>
      </div>

      <label for="grade" class="form-label">Grade</label>
      <select v-model="grade">
        <option value="Grade">Grade</option>
        <option value="Subject">Subject</option>
        <option value="Topic">Topic</option>
        <option value="other">Other</option>
        <!-- Add more categories as needed -->
      </select>
      <input v-if="grade === 'other'" class="input-group mb-3" v-model="customgrade" placeholder="Enter custom grade"><br>

      <label for="subject" class="form-label">Subject</label>
      <select v-model="subject">
        <option value="Subject">Subject</option>
        <option value="other">Other</option>
      </select>
      <input v-if="subject === 'other'" class="input-group mb-3" v-model="customsubject" placeholder="Enter custom subject">

      <label for="topic" class="form-label">Topic</label>
      <select v-model="topic">
        <option value="Topic">Topic</option>
        <option value="other">Other</option>
      </select>
      <input v-if="topic === 'other'" class="input-group mb-3" v-model="customtopic" placeholder="Enter custom topic">

      <br /><br />
      <div>
        <button type="submit" class="btn btn-outline-success btn-lg">Upload</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'AddVideos',
  data() {
    return {
      name: '',
      grade: 'Grade',
      subject: 'Subject',
      topic: 'Topic',
      customgrade: '',
      customsubject: '',
      customtopic: '',
      selectedFile: null,
    };
  },

  methods: {
    handleFileChange(event) {
      // Store the selected file for uploading
      this.selectedFile = event.target.files[0];
    },

    async uploadVideo() {

    if (this.grade === null) {
      this.grade = this.customgrade;
    }
    if (this.subject === null) {
      this.subject = this.customsubject;
    }
    if (this.topic === null) {
      this.topic = this.customtopic;
    }

    try {
     await axios.post('http://127.0.0.1:8000/api/videos', 
      
     {video: this.selectedFile, 
      name: this.name,
      grade: this.grade,
      subject: this.subject,
      topic: this.topic
    });
      console.log('Video uploaded successfully!', response.data);
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
