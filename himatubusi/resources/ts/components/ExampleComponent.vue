<template>
    <div>
        <Loading :show_loading="show_loading"></Loading>
        <div id="youtube">
            <YouTube
                v-if="show_loading === false"
                :vars="playerVars"
                :src="src"
                :width="1100"
                :height="750"
                @ready="onReady"
                ref="youtube" />
        </div>
    </div>
</template>

<script lang="ts">
    import { defineComponent,ref,onMounted,SetupContext, reactive } from "vue";
    import YouTube from 'vue3-youtube'
    import Loading from './Loading.vue'
    import axios from 'axios'
    export default defineComponent({
        components: {
            YouTube,
            Loading
        },
        setup(context:SetupContext) {
            const src = ref("")
            const show_loading = ref(true)
            const playlist = ref("")
            const youtube = ref<InstanceType<typeof YouTube>>()// 1: 型を指定
            const playerVars = reactive({
                    autoplay: 1,
                    playlist: playlist.value,
                    height: '200',
                    width: '300',
            });
            const created = async() => {
                const lists = await axios.get('/youtube')
                const videoIds = lists.data.map((v: { id: { videoId: string; }; }) => {
                    return v.id.videoId
                })
                src.value = videoIds.shift()
                playerVars.playlist = videoIds.join()
                show_loading.value = false
            }
            const onReady = () => {
                youtube.value?.playVideo()
            }
            created()
            onMounted(() => {
                if (!youtube.value) return // 型から undefined をなくす
            })
            return {
              playerVars,
              onReady,
              src,
              youtube,
              show_loading
            };
        },

    })
</script>
<style>
 /* #youtube {
 	position: absolute;
 	top:0;
 	width: 100%;
 	height: 100%;
 	background: #FFF;
 	z-index: 9999999999;
 } */
</style>