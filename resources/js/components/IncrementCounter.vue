<script>
import { ref } from 'vue'
import InputCheck from './InputCheck.vue'
export default {
  setup() {
    const count = ref(0)

    function increment() {
      // .value is needed in JavaScript
      count.value++
    }

    // don't forget to expose the function as well.
    return {
      count,
      increment
    }
  }
}
</script>
 
<template>
  <button
    type="button"
    @click="increment"
    class="p-2 text-white bg-gray-500 rounded"
  >
    Counter is: {{ count }}
  </button>
  <input-check/>
</template>