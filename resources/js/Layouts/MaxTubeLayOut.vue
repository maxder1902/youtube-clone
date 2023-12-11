<script setup>
    import { Head } from "@inertiajs/vue3";
    import SearchVideos from "@/Components/SearchVideos.vue";
    import DropdownLink from "@/Components/DropdownLink.vue";
    import MaxTubeLogo from "@/Components/MaxTubeLogo.vue";

    defineProps({
        title: String,
    })

</script>

<template>
    <Head :title="title" />
    <div class="min-h-screen bg-slate-900">
        <div class="flex">
            <MaxTubeLogo />

            <SearchVideos />

            <DropdownLink :href="route('profile.show')">
                Profile
            </DropdownLink>
        </div>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 mt-8 ml-48 mr-28 mb-8">

        <slot></slot>
    </div>

    
</template>