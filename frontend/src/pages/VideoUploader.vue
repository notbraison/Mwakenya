<template>
<div class="form-group ">
  <form @submit.prevent="uploadVideo" id="videoform"></form>

   <div> <h2>Upload Video</h2></div> <br>
   
   <div> <input type="file" @change="uploadVideo" accept="video/*" ></div>   <br><br> 
   &nbsp;
      
    <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" placeholder="name of video" v-model="name" required>
    </div>

    <label for="grade" class="form-label">Grade</label>&nbsp;
    <select v-model="grade">
      <option value="grade">Grade</option>
      <option value="Subject">Subject</option>
      <option value="Topic">Topic</option>
      <option value="other">other</option>
      <!-- Add more categories as needed -->
    </select>&nbsp;&nbsp;
    <input v-if="grade === 'other'" v-model="customgrade" placeholder="Enter custom grade">
    
    <label for="subject" class="form-label">Subject</label>&nbsp;
    <select v-model="subject">
      <option value="grade">Grade</option>
      <option value="Subject">Subject</option>
      <option value="Topic">Topic</option>
      <option value="other">other</option>
     
      <!-- Add more categories as needed -->
    </select>&nbsp;
    <input v-if="subject === 'other'" v-model="customsubject" placeholder="Enter custom subject">
    
    <label for="topic" class="form-label">Topic</label>&nbsp;
    <select v-model="topic">
      <option value="grade">Grade</option>
      <option value="Subject">Subject</option>
      <option value="Topic">Topic</option>
      <option value="other">other</option>
      <!-- Add more categories as needed -->
    </select>
    <input v-if="topic === 'other'" v-model="customtopic" placeholder="Enter custom topic">

    <br>  <br> <br>
  <div>
    <button type="submit" class="btn btn-outline-success btn-lg">upload</button>
  </div>
  </div>

  
</template>

<script>
import axios from 'axios';
import { NULL } from 'mysql/lib/protocol/constants/types';

export default{
  name: 'AddVideos',
  data() {
    return {
      name:'',
      grade: '', 
      subject: '', 
      topic: '', 
      customgrade:'',
      customsubject:'',
      customtopic:''

    };
  },

  methods: {
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
      
     { name: this.name,
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
.form-group{
  top:5%;
}

</style>