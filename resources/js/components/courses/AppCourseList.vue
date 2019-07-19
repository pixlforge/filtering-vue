<template>
  <ul>
    <li
      v-for="course in courses"
      :key="course.id">
      <AppCourse :course="course"/>
    </li>
  </ul>
</template>

<script>
import AppCourse from './AppCourse';

export default {
  components: {
    AppCourse
  },
  props: {
    courses: {
      type: Array,
      required: true
    }
  }
}
</script>
