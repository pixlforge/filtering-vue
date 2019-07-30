<template>
  <div>
    <ul>
      <li
        v-for="(map, key) in filters"
        :key="key"
        class="mb-6">
        <h5 class="text-xs font-black uppercase tracking-wide pl-1 mb-2">
          {{ map.title }}
        </h5>
        <ul class="bg-white border-2 border-gray-300 rounded-lg">
          <li
            v-for="(filter, value) in map.options"
            :key="value">
            <a
              href="#"
              class="block hover:bg-blue-300 font-semibold hover:text-white hover:no-underline pl-3 py-2"
              @click.prevent="activateFilter(key, value)">
              {{ filter }}
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    endpoint: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      filters: {},
      selectedFilters: {}
    }
  },
  mounted() {
    axios.get(this.endpoint).then(res => {
      this.filters = res.data.data
    })
  },
  methods: {
    activateFilter(key, value) {
      this.selectedFilters = Object.assign({}, this.selectedFilters, {
        [key]: value
      })

      this.$router.push({ query: { ...this.selectedFilters } })
    }
  }
}
</script>
