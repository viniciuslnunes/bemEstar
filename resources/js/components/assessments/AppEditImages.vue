<template>
    <div>
        <img :src="! image.url ? '/storage/img-avaliacoes/' + image.image : image.url" style="width: 100px;">
        <p @click="$emit('delete-image', i)" style="cursor: pointer; color: red;">Deletar</p>
    </div>
</template>

<script>
export default {
    props: {
        image: {
            type: Object,
            required: true
        },
        i: {
            type: Number,
            required: true
        }
    }
}
</script>