<template>
    <div v-for="video in videos" :key="video.id">
        <p>Title: {{ video.title }}</p>
        <p>Duration: {{ video.duration }}s</p>
        <p>Uploaded: {{ video.created_at }}</p>
    </div>
</template>

<script setup>
    const props = defineProps({
        videos: Array,
    });
</script>