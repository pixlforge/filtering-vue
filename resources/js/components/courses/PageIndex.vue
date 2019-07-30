<template>
  <div class="container flex mx-auto">
    <div class="w-1/4 mr-3">
      <AppFilters endpoint="/api/courses/filters"></AppFilters>
    </div>
    <div class="w-3/4 bg-white border-2 border-gray-300 rounded-lg ml-3 p-4">

      <template v-if="courses.length">
        <AppCourseList :courses="courses"/>
        
        <AppPagination
        :meta="meta"
        @pagination:switched="paginationSwitched"/>
      </template>
      
      <template v-else>
        <p class="text-xl text-center font-bold mt-24">
          Sorry, we couldn't find any course matching your criteria :(
        </p>
      </template>
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
      currentPage: this.$route.query.page,
      query: this.$route.query
    }
  },
  watch: {
    '$route.query': {
      handler(query) {
        this.query = query
        this.currentPage = 1
        this.getCourses()
      },
      deep: true
    }
  },
  mounted() {
    this.getCourses()
  },
  methods: {
    getCourses() {
      axios.get('/api/courses', {
        params: {
          page: this.currentPage,
          ...this.query
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

      this.$router.push({
        query: Object.assign({}, this.query, { page: this.currentPage })
      })
    }
  }
}
</script>

