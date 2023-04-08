<template>
    <!-- <div :class="estilo" role="alert">
       {{ text }}
    </div> -->
    <div>
        <span :class="estilo" role="alert">
            {{ text }}
        </span>
    </div>
</template>
<script>
export default {
    props: ['alert', 'text'],
    computed: {
        estilo() {
            return 'text-danger'
        }
    }
}
</script>
