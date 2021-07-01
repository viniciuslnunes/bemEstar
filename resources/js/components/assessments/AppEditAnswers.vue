<template>
    <tr>
        <td>
            <input type="text" v-model="question.quest">
        </td>
        <td>
            <input type="text" name="nota" v-model="question.answer.nota">
        </td>
        <td>
            <textarea name="answer" cols="30" rows="5" v-model="question.answer.answer"></textarea>
        </td>
        <td>
            <images style="display: flex;"
                v-for="(image, i) in question.answer.images"
                :key="image.id"
                :image="image"
                :i="i"
                :formData="formData"
                @delete-image="deleteImage($event)"sfsd
            />
                
            <div class="row">
                <input type="file" @input="newImage($event)">
            </div>
        </td>
    </tr>
</template>

<script>
import AppEditImages from './AppEditImages.vue';

export default {
    components: {
        Images: AppEditImages  
    },
    props: {
        question: {
            type: Object,
            required: true
        },
        formData: {
            type: FormData,
            required: true
        }
    },
    methods: {
        newImage(event) {
            this.question.answer.images.push({
                answer_id: this.question.answer.id,
                url: URL.createObjectURL(event.target.files[0]),
            });

            this.$emit('added-photo', {
                'photo': event.target.files[0],
                'answerId': this.question.answer.id
            })
        },
        deleteImage(index) {
            this.question.answer.images.splice(index, 1);
        }
    }
}
</script>

<style scoped>
.inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.inputfile:focus + label {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label * {
    pointer-events: none;
}
</style>