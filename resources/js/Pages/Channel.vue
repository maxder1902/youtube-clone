<script setup>
    import MaxTubeLayOut from '@/Layouts/MaxTubeLayOut.vue';

    const props = defineProps({
        videos: Object,
        user: Object,
    });
    
</script>

<template>
    <MaxTubeLayOut>
        <h1>This is {{ user.name }}'s channel</h1>
    </MaxTubeLayOut>
</template>