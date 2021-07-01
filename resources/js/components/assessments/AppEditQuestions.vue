<template>
    <div>
        <div>
            <p>Nome do Cliente: {{ assessment.client.nome_empresa }}</p>
            <select class="custom-select" v-model="assessment.client_id">
                    <option>Cliente</option>
                    <option
                        v-for="cliente in clientes"
                        :key="cliente.id"
                        :value="cliente.id"
                        :selected="assessment.client.id === cliente.id"
                    >
                        {{ cliente.nome_empresa }}
                    </option>
            </select>
            <select class="custom-select" v-model="assessment.form.status">
                    <option>Status</option>
                    <option :selected="assessment.form.status === 0" value="0">Finalizado</option>
                    <option :selected="assessment.form.status === 1" value="1">Em andamento</option>
            </select>
            <p>Data de inicio: {{ assessment.data_inicio }}</p>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <td>Pergunta</td>
                    <td>Nota</td>
                    <td>Resposta</td>
                    <td>Imagem</td>
                </tr>
                <answer 
                    v-for="(question, i) in assessment.form.quest_form"
                    :key="question.id"
                    :question="question"
                    :index="i"
                    :formData="formData"
                    :photo="photo"
                    @added-photo="addToFormData($event)"
                />
            </tbody>
        </table>
        <button class="btn btn-primary btn-round btn-lg btn-block waves-effect waves-light" @click="update()">
            Salvar
        </button>
        <div v-if="loading">
            <p style="color: blue;">
                Carregando...
            </p>
        </div>
        <div v-if="error">
            <p style="color: red;">
                Erro!
            </p>
        </div>
        <div v-if="success">
            <p style="color: limegreen;">
                Sucesso!
            </p>
        </div>
    </div>
</template>

<script>
import AppEditAnswers from './AppEditAnswers.vue';
import axios from 'axios';

export default {
    components: {
        Answer: AppEditAnswers
    },
    props: {
        assessmentData: {
            type: String,
            required: true
        },
        clientesData: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            assessment: {},
            editedAssessment: {},
            clientes: {},
            photo: {},
            formData: new FormData(),
            loading: false,
            error: false,
            success: false,
        }
    },
    created() {
        this.assessment = JSON.parse(this.assessmentData);
        this.clientes = JSON.parse(this.clientesData);
    },
    methods: {
        update() {
            this.success = false,
            this.error = false,
            this.loading = true;

            this.formData.append('_method', 'PATCH');
            this.formData.append('assessment', JSON.stringify(this.assessment));
            
            axios.post('/avaliacoes/' + this.assessment.id, this.formData)
            .catch(() => {
                this.loading = false;
                this.error = true;
            })
            .then(() => {
                this.loading = false;
                this.success = true;

                setTimeout(() => this.success = false, 2000);
            });
        },
        addToFormData(file) {
            this.formData.append(file.answerId + ',' + new Date().getUTCMilliseconds(), file.photo);
        }
    }
}
</script>