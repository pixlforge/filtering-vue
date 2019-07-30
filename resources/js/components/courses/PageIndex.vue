<template>
  <div class="container flex mx-auto">
    <div class="w-1/4 mr-3">
      <AppFilters endpoint="/api/courses/filters"></AppFilters>
    </div>
    <div class="w-3/4 bg-white border-2 border-gray-300 rounded-lg ml-3 p-4">
      <AppCourseList
        v-if="courses.length"
        :courses="courses"/>

      <AppPagination
        :meta="meta"
        @pagination:switched="paginationSwitched"/>
    </div>    
  </div>
</template>

<script>
import AppFilters from './AppFilters'
import AppCourseList from "./AppCourseList"
import AppPagination from '../pagination/AppPagination'

export default {
  components: {
    AppFilters,
    AppCourseList,
    AppPagination,
  },
  data() {
    return {
      courses: [],
      meta: {},
      currentPage: 1
    }
  },
  mounted() {
    this.currentPage = this.$route.query.page
    this.getCourses()
  },
  methods: {
    getCourses() {
      axios.get('/api/courses', {
        params: {
          page: this.currentPage
        }
      }).then(res => {
          this.courses = res.data.data
          this.meta = res.data.meta
        });
    },
    paginationSwitched(page) {
      if (page === this.meta.current_page) {
        return
      }

      this.currentPage = page

      this.getCourses()

      this.$router.push({
        query: {
          page: this.currentPage
        }
      })
    }
  }
}
</script>

