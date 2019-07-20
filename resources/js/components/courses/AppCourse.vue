<template>
  <div class="flex my-16">
    <div class="w-32">
      <a href="#">
        <img
          :alt="course.name"
          src="img/320x320.png"
          class="w-full">
      </a>
    </div>
    <div class="flex-grow px-4 pb-4">
      <div class="">
        <ul
          v-if="course.subjects.length"
          class="flex border-b border-gray-200 pb-2 -mx-2 mb-3">
          <li
            v-for="subject in course.subjects"
            :key="subject.id"
            class="mx-2">
            {{ subject.name }}
          </li>
        </ul>
        <h3 class="text-2xl font-bold">
          {{ course.name }}
        </h3>
        <ul class="flex -mx-2 mt-3">
          <li class="mx-2">
            <span
              :class="course.formattedAccess === 'free' ? 'bg-blue-200' : 'bg-orange-200'"
              class="capitalize rounded-full px-3 py-1">
              {{ course.formattedAccess }}
            </span>
          </li>
          <li class="mx-2">
            <span class="capitalize">
              {{ course.difficulty }}
            </span>
          </li>
          <li class="mx-2">
            <span class="capitalize">
              {{ course.type }}
            </span>
          </li>
          <li class="mx-2">
            <span class="capitalize">
              {{ course.formattedStarted }}
            </span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    course: {
      type: Object,
      required: true
    }
  }
}
</script>
