<template>
    <YouTube
        :vars="playerVars"
        :src="src"
        ref="youtube" />

</template>

<script lang="ts">
    import { defineComponent,ref,onMounted,SetupContext, reactive } from "vue";
    import YouTube from 'vue3-youtube'
    import axios from 'axios'
    export default defineComponent({
        components: {
            YouTube
        },
        setup(context:SetupContext) {
            const created = async() => {
                const lists = await axios.get('/youtube')
                const videoIds = lists.data.map((v: { id: { videoId: string; }; }) => {
                    return v.id.videoId
                })
                src.value = videoIds.shift()
                playlist.value = videoIds.join()
            }
            created()
            const videoId = 'lG0Ys-2d4MA';
            // const url = "https://www.youtube.com/watch?v=" + videoId +'?autoplay=1'
            const src = ref("")
            const playlist = ref<string[]>([])
            const youtube = ref<InstanceType<typeof YouTube>>()// 1: 型を指定
            const playerVars = reactive({
                    autoplay: 1,
                    playlist: playlist.value
            });
            onMounted(() => {
                if (!youtube.value) return // 型から undefined をなくす
            })

            return {
              playerVars,
              src,
              youtube,
            };
        },

    })
</script>