<template>
  <div class="form-group">
      <form @submit.prevent="uploadBook" id="bookform" enctype="multipart/form-data" >

      <h2>Upload Book</h2>
      <br />

      <input type="file" @change="handleFileChange" accept=".pdf, .mobi, .epub, .doc, .docx" name="book">
      <br /><br />

      <div class="mb-3">
        <label for="name" class="form-label">Title</label>
        <input type="text" class="form-control" id="name" placeholder="Title of the book" v-model="title" required>
      </div>

      <label for="grade" class="form-label">Grade</label>
    <select v-model="selectedGrade" class="form-select" id="floatingSelect" aria-label="Floating label select example">
      <option value="" disabled>Select a grade</option>
      <option v-for="grade in grades" :value="grade" :key="grade.id">{{ grade }}</option>
      <option value="customgrade">Custom Grade</option>
    </select>
    <br>
    <input v-if="selectedGrade === 'customgrade'" class="input-group-text" v-model="customgrade" placeholder="Enter custom grade">
    <br />

      <label for="subject" class="form-label">Subject</label>
      <select v-model="selectedSubject" class="form-select" id="floatingSelect1" aria-label="Floating label select example">
      <option value="" disabled>Select a subject</option>
      <option v-for="subject in subjects" :value="subject" :key="subject.id">{{ subject }}</option>
      <option value="customsubject">Custom Subject</option>
    </select>
      <br>
      <input v-if="selectedSubject === 'customsubject'" class="input-group-text" v-model="customsubject" placeholder="Enter custom subject">
      
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
  name: 'addBooks',
  data() {
    return {
      title: '',
      grade: 'Grade',
      subject: 'Subject',
      customgrade: '',
      customsubject: '',
      book:'',

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
    extractTitleFromFileName(event) {
      // Extract title from the uploaded file name
      const fileName = event.target.files[0].name;
      const fileExtension = fileName.split('.').pop(); // Get the file extension
      const title = fileName.replace(`.${fileExtension}`, ''); // Remove extension
      this.title = title;
    },

    handleFileChange(event) {
      // Store the selected file for uploading
      this.extractTitleFromFileName(event);
      this.book = event.target.files[0];
    
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

    async uploadBook() {

     if (this.grade === null) {
      this.grade = this.customgrade;
    }
    if (this.subject === null) {
      this.subject = this.customsubject;
    } 

    try {
     await axios.post('http://127.0.0.1:8000/api/books', 
      
     {book: this.book, 
      title: this.title,
      grade: this.grade,
      subject: this.subject,
    });
    console.log(title)
      console.log('Book uploaded successfully!',this.name);
    } catch (error) {
      console.error('Error uploading book:', error);
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
