<template>
  <div class="container flex mx-auto">
    <div class="w-1/4 mr-3">
      <h5 class="text-xs font-black uppercase tracking-wide pl-1 mb-2">
        Title
      </h5>
      <div class="bg-white border-2 border-gray-300 rounded-lg">
        sdf
      </div>
    </div>
    <div class="w-3/4 bg-white border-2 border-gray-300 rounded-lg ml-3 p-4">
      <AppCourseList
        v-if="courses.length"
        :courses="courses"/>
    </div>    
  </div>
</template>

<script>
import AppCourseList from "./AppCourseList";

export default {
  components: {
    AppCourseList
  },
  data() {
    return {
      courses: []
    };
  },
  mounted() {
    axios.get('/api/courses')
      .then(res => {
        this.courses = res.data.data;
      });
  }
}
</script>

