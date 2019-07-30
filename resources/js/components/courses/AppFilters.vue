<template>
  <div>
    <p
      v-if="filtersInUse"
      class="bg-red-400 hover:bg-red-300 font-semibold text-white hover:no-underline pl-3 py-2 mb-4"
      @click.prevent="clearFilters">
      &times; Clear all filters
    </p>
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
              :class="{
                'bg-blue-400 text-white': selectedFilters[key] === value
              }"
              class="block hover:bg-blue-300 font-semibold hover:text-white hover:no-underline pl-3 py-2"
              @click.prevent="activateFilter(key, value)">
              {{ filter }}
            </a>
          </li>
          <li>
            <a
              v-if="selectedFilters[key]"
              href="#"
              class="block bg-red-400 hover:bg-red-300 font-semibold text-white hover:no-underline pl-3 py-2"
              @click.prevent="clearFilter(key)">
              &times; Clear
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
      selectedFilters: _.omit(this.$route.query, ['page'])
    }
  },
  computed: {
    filtersInUse() {
      return !_.isEmpty(this.selectedFilters)
    }
  },
  mounted() {
    axios.get(this.endpoint).then(res => {
      this.filters = res.data.data
    })
  },
  methods: {
    applyFilter() {
      this.$router.push({
        query: {
          ...this.selectedFilters,
          page: 1
        }
      })
    },
    clearFilter(key) {
      this.selectedFilters = _.omit(this.$route.query, [key])
      this.applyFilter()
    },
    clearFilters() {
      this.selectedFilters = {}
      this.applyFilter()
    },
    activateFilter(key, value) {
      this.selectedFilters = Object.assign({}, this.selectedFilters, {
        [key]: value
      })
      this.applyFilter()
    }
  }
}
</script>
