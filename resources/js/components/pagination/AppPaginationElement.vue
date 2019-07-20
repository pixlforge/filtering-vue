<template>
  <li>
    <a
      href="#"
      :class="{
        'border-l border-r': role === 'default',
        'rounded-l-lg border-l-2 border-r': role === 'prev',
        'rounded-r-lg border-r-2 border-l': role === 'next',
        'bg-blue-400 hover:bg-blue-300 text-xl text-white font-bold': active,
        'bg-white hover:bg-gray-100': !active
      }"
      class="block border-b-2 border-t-2 border-gray-200 hover:text-gray-900 hover:no-underline cursor-pointer select-none px-3 py-1"
      @click.prevent="clickedPage">
      <span>
        <template v-if="!page && role === 'prev'">
          &laquo;
        </template>
        <template v-else-if="!page && role === 'next'">
          &raquo;
        </template>
        <template v-else>
          {{ page }}
        </template>
      </span>
    </a>
  </li>
</template>

<script>
export default {
  props: {
    role: {
      type: String,
      required: false,
      default: 'default'
    },
    page: {
      type: Number,
      required: false,
      default: null
    },
    active: {
      type: Boolean,
      required: false,
      default: false
    }
  },
  methods: {
    clickedPage() {
      let page;

      if (this.page) {
        page = this.page;
      } else {
        page = this.role;
      }

      this.$emit('clicked:page', page)
    }
  }
}
</script>
