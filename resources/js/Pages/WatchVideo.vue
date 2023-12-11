<script setup>
    import MaxTubeLayOut from '@/Layouts/MaxTubeLayOut.vue';

    const props = defineProps({
        video: Object,
        user: Object,
    });
    const formatedUrl = props.video.video_url.slice(16, (props.video.video_url.length));

</script>

<template>
    <MaxTubeLayOut>
        <video height="240" width="320" controls>
            <source :src="formatedUrl" type="video/mp4">
        </video>
        <h1>{{ video.title }}</h1>
        <p><a :href="'/channels/' + user.email">{{ user.email }}</a></p>
        <p>{{ video.description }}</p>
    </MaxTubeLayOut>
</template>