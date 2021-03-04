<style scoped>
  .loading {
      width: 100%;
      text-align: center;
  }

</style>

<template>
    <div v-if="show_loading" class="fixLoaderWrap">
        <div class="fixLoaderBox">
            <div uk-spinner="ratio: 4" class="loading"></div>
        </div>
    </div>
</template>

<script lang="ts">
  import { defineComponent } from 'vue'
  import 'uikit/dist/css/uikit.css'
  import 'uikit/dist/css/uikit.min.css'
  type Props = {
      show_loading: Boolean
  }
  export default defineComponent({
      props: {
          show_loading:{
              type: Boolean,
              default: true
          }
      },
      setup(props: Props){
          props.show_loading
      }
  })
</script>
