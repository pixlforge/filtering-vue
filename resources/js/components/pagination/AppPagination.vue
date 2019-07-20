<template>
  <nav>
    <ul class="flex items-center">
      <AppPaginationElement
        v-if="lastPage"
        role="prev"
        @clicked:page="clickedPage"/>
      
      <AppPaginationElement
        v-for="page in meta.last_page"
        :key="page"
        :page="page"
        :active="page === meta.current_page"
        @clicked:page="clickedPage"/>
      
      <AppPaginationElement
        v-if="lastPage"
        role="next"
        @clicked:page="clickedPage"/>
    </ul>
  </nav>
</template>

<script>
import AppPaginationElement from "./AppPaginationElement";

export default {
  components: {
    AppPaginationElement
  },
  props: {
    meta: {
      type: Object,
      required: true
    }
  },
  computed: {
    lastPage() {
      return this.meta.last_page;
    }
  },
  methods: {
    clickedPage(page) {
      this.$emit('pagination:switched', this.getPageToSwitchTo(page));
    },
    getPageToSwitchTo(page) {
      if (page === 'prev') {
        page = this.meta.current_page - 1;

        if (page < 1) {
          page = 1;
        }
      } else if (page === 'next') {
        page = this.meta.current_page + 1;

        if (page > this.meta.last_page) {
          page = this.meta.last_page;
        }
      }

      return page;
    }
  }
}
</script>

