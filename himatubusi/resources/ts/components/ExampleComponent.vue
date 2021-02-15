<template>
    <YouTube
        :src="src"
        @ready="onReady"
        ref="youtube" />

</template>

<script lang="ts">
    import { defineComponent,ref,onMounted,SetupContext } from "vue";
    import YouTube from 'vue3-youtube'
    export default defineComponent({
        components: {
            YouTube
        },
        setup(context:SetupContext) {
            const videoId = 'lG0Ys-2d4MA';
            const url = "https://www.youtube.com/watch?v=" + videoId
            const src = ref(url)
            const youtube = ref<InstanceType<typeof YouTube>>()// 1: 型を指定

            onMounted(() => {
                if (!youtube.value) return // 型から undefined をなくす
            })
            const onReady = () => {
                youtube.value?.playVideo()
            }

            return {
              src,
              youtube,
              onReady
            };
        },

    })
</script>