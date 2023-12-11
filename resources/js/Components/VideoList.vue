<script setup>
const formatDuration = (durationInSeconds) => {
  const minutes = Math.floor(durationInSeconds / 60);
  const seconds = durationInSeconds % 60;
  return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
};

const formatDate = (givenDate) => {
    const todayDate = new Date();
  const uploadDate = new Date(givenDate);
  const differenceInMilliseconds = todayDate - uploadDate;

  // Calcula la diferencia en días
  const differenceInDays = Math.floor(differenceInMilliseconds / (24 * 60 * 60 * 1000));

  if (differenceInDays >= 30) {
    // Más de 30 días, formatea como mes
    const monthsAgo = Math.floor(differenceInDays / 30);
    return `${monthsAgo} ${monthsAgo === 1 ? 'month' : 'months'} ago`;
  } else if (differenceInDays >= 7) {
    // Más de 7 días, formatea como semana
    const weeksAgo = Math.floor(differenceInDays / 7);
    return `${weeksAgo} ${weeksAgo === 1 ? 'week' : 'weeks'} ago`;
  } else if (differenceInDays >= 1) {
    // Más de 1 día, formatea como día
    return `${differenceInDays} ${differenceInDays === 1 ? 'day' : 'days'} ago`;
  } else {
    // Menos de 1 día, formatea como horas
    const differenceInHours = Math.floor(differenceInMilliseconds / (60 * 60 * 1000));
    return `${differenceInHours} ${differenceInHours === 1 ? 'hour' : 'hours'} ago`;
  }
}

const formatUrl = (url) => {
  url = url.slice(16, url.length);
  return url;
};

const emits = defineEmits(['formatDuration', 'formatDate', 'formatUrl']);
</script>

<template>
    <div class="ml-40 flex text-green-500" v-for="video in videos" :key="video.id">
        <div class="block px-8 border-solid border-2 border-gray-500 rounded-md py-4 mx-6 my-4">
            <video height="60" width="80">
                <source :src="formatUrl(video.video_url)">
            </video>
            <p><a :href="'/video/' + video.id">Title: {{ video.title }}</a></p>
            <p>Duration: {{ formatDuration(video.duration) }}</p>
            <p>Uploaded: {{ formatDate(video.created_at) }}</p>
        </div>
    </div>
</template>