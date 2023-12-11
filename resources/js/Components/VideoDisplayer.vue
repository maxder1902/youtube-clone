<template>
<div class="ml-40 flex text-green-500">
    <div class="block px-8 border-solid border-2 border-gray-500 rounded-md py-4 mx-6">
        <h1><pre>{{ props.videos }}</pre></h1>
        <p>Uploaded</p>
        <p>Duration</p>
    </div>
    <div class="px-8 border-solid border-2 border-gray-500 rounded-md py-4 mx-6">
        <h1>Thumbnail</h1>
        <p>Title 2</p>
        <p>Uploaded</p>
        <p>Duration</p>
    </div>
    <div class="px-8 border-solid border-2 border-gray-500 rounded-md py-4 mx-6">
        <h1>Thumbnail</h1>
        <p>Title 3</p>
        <p>Uploaded</p>
        <p>Duration</p>
    </div>
</div>
</template>

<script setup>
    const props = defineProps({
        videos: {
            type: Array,
        },
    });
</script>