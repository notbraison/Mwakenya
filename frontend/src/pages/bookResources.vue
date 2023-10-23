<template>
  <div>
    <SearchBar />
    <SideNav @criteriaChange="fetchBooks" />

    <div>
      <h1>Books List</h1>
      <!-- <ul>
        <li v-for="book in books" :key="book.id">{{ book.name }}</li>
      </ul> -->

     <BookView/> 

    
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import SearchBar from '../components/SearchBar.vue';
import SideNav from '../components/SideNav.vue';
import BookView from '../components/BookView.vue';

export default {
  name: 'bookResources',
  components: {
    SearchBar,
    SideNav,
    BookView
  },
  data() {
    return {
      books: [], // Store the filtered books,
      criteria//store selected grade subject
    };
  },
  methods: {
    async fetchBooks(criteria) {
      try{

        // Call the backend API to fetch books based on criteria
      //criteria is grade and subjects

      criteria = {
        selectedGrade,
        selectedSubject
      }
      
      axios.get('/api/books', { params: criteria }) // Pass criteria as query parameters
        .then((response) => {
          this.books = response.data;
        })
        
      }catch(error) {
          console.error('Error fetching books:', error);
        };
      
    },
  },
  mounted() {
    // Fetch all books when the component is mounted
    this.fetchBooks({});
  },
};
</script>

<style></style>
