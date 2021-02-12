<template>
    <div class="container">
        <youtube :video-id="videoId" ref="youtube"></youtube>
        <!-- <button @click="playVideo">play</button> -->
    </div>
</template>

<script lang="ts">
    import { defineComponent,ref,onMounted,computed, SetupContext } from "vue";
    export default defineComponent({
        setup(context:SetupContext) {
            // const message = ref("Hello Laravel Vue 3");
            const videoId = ref('lG0Ys-2d4MA');
            const youtube = ref(null);
            const playVideo = () => {
                // player.playVideo()
                console.log(player.value)
            }
            const player = computed({
                get: () => {
                    return youtube.player.value
                },
                set: () => {}
            })
            playVideo()


            return {
              videoId,
            //   playVideo
            };
        },

    })
</script>