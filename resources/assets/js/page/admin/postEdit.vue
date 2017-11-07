<template>
    <v-container fluid fill-heigh>
        <v-toolbar>
            <v-toolbar-title>文章</v-toolbar-title>
        </v-toolbar>
        <v-card color="grey lighten-4" flat>
            <v-container grid-list-md>
                <v-layout row wrap>
                    <v-flex xs12>
                        <div class="body-2">Light Theme</div>
                    </v-flex>
                    <v-flex xs12 sm6>
                        <v-text-field box label="First Name" v-model="first"></v-text-field>
                    </v-flex>
                    <v-flex xs12 sm6>
                        <v-text-field box label="Last Name" v-model="last"></v-text-field>
                    </v-flex>
                    <v-flex xs12>
                        <v-text-field
                                box
                                label="Email address"
                                :rules="emailRules"
                                v-model="email"
                                hint="Enter your email!"
                                persistent-hint
                        ></v-text-field>
                    </v-flex>
                    <v-flex xs12>
                        <v-text-field box multi-line label="Bio"></v-text-field>
                    </v-flex>
                    <v-flex xs6></v-flex>
                </v-layout>
            </v-container>
            <v-card-actions>
                <v-btn flat @click="resetForm">Cancel</v-btn>
                <v-btn
                        flat
                        color="primary"
                        type="submit"
                        :disabled="!formIsValid"
                >Register</v-btn>
                <update></update>
            </v-card-actions>
        </v-card>
    </v-container>
</template>

<script>
    import update from '../../components/upload.vue'
    export default {
        components: {
            update
        },
        data: () => ({

        })
    }
</script>