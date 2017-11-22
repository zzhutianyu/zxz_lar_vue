<template>
    <v-container fluid fill-heigh>
        <v-layout row>
            <v-flex xs12 sm12  md12 lg12 xl12>
                <v-card>
                    <v-toolbar color="light-blue" dark>
                        <v-toolbar-side-icon></v-toolbar-side-icon>
                        <v-toolbar-title>My files</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="upload_modal=true">
                            <v-icon>cloud_upload</v-icon>
                        </v-btn>
                        <v-btn icon @click="dialog=true">
                            <v-icon>add</v-icon>
                        </v-btn>
                        <v-btn icon >
                            <v-icon>view_module</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-list two-line subheader>
                        <v-breadcrumbs divider="/">
                            <v-breadcrumbs-item
                                    v-for="(item, index) in items3" :key="item.text"
                            >
                               <div @click="alter(index)">{{ item.text}}</div>
                            </v-breadcrumbs-item>
                        </v-breadcrumbs>
                        <v-subheader inset>Folders</v-subheader>
                        <v-list-tile avatar v-for="(item, index) in items" v-bind:key="item.title" @click="changeFolder(item.title)">
                            <v-list-tile-avatar>
                                <v-icon v-bind:class="[item.iconClass]">{{ item.icon }}</v-icon>
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                            </v-list-tile-content>
                            <v-list-tile-action>
                                <v-btn icon ripple @click.stop="de_modal(index)">
                                    <v-icon color="grey lighten-1">delete</v-icon>
                                </v-btn>
                            </v-list-tile-action>
                        </v-list-tile>
                        <v-divider inset></v-divider>
                        <v-subheader inset>Files</v-subheader>
                        <v-list-tile v-for="(item, index) in items2" v-bind:key="item.title" avatar @click="">
                            <v-list-tile-avatar>
                                <v-icon v-bind:class="[item.iconClass]">{{ item.icon }}</v-icon>
                            </v-list-tile-avatar>
                            <v-list-tile-content>
                                <v-list-tile-title>{{ item.title }}</v-list-tile-title>
                                <v-list-tile-sub-title>{{ item.subtitle }}</v-list-tile-sub-title>
                            </v-list-tile-content>
                            <v-list-tile-action>
                                <v-btn icon ripple @click.stop="de_fi(index)">
                                    <v-icon color="grey lighten-1">delete</v-icon>
                                </v-btn>
                            </v-list-tile-action>
                        </v-list-tile>
                    </v-list>
                </v-card>
            </v-flex>
        </v-layout>
        <v-dialog v-model="dialog" max-width="500px">
            <v-card>
                <v-card-title>
                    创建文件夹
                </v-card-title>
                <v-card-text>
                    <v-text-field
                            name="new"
                            label="new 文件名"
                            id="testing"
                            v-model="new_folder"
                    ></v-text-field>
                </v-card-text>
                <v-card-actions>
                    <v-btn color="primary" flat @click.stop="createFolder">Create</v-btn>
                    <v-btn color="primary" flat @click.stop="dialog=false">Close</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

        <v-layout row justify-center>
            <v-dialog v-model="de_folder" persistent max-width="290">
                <v-btn color="primary" dark @click.stop="deleteFolder">确认删除</v-btn>
                <v-btn color="primary" dark @click.stop="de_folder=false">Close</v-btn>
            </v-dialog>
        </v-layout>
        <v-layout row justify-center>
            <v-dialog v-model="de_file" persistent max-width="290">
                <v-btn color="primary" dark @click.stop="deleteFile">确认删除</v-btn>
                <v-btn color="primary" dark @click.stop="de_file=false">Close</v-btn>
            </v-dialog>
        </v-layout>

        <v-layout row justify-center>
            <v-dialog v-model="upload_modal" persistent max-width="500px">
                <v-card>
                    <v-card-title>
                        <span class="headline">上传文件</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <input type="file" @change="change">
                            </v-layout>
                        </v-container>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click.native="upload_modal=false">Close</v-btn>
                        <v-btn color="blue darken-1" flat @click.native="upload">Save</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-layout>
    </v-container>
</template>

<script>
    import update from '../../components/upload.vue'


    export default {
        data: () => ({
            items: [],
            items2: [

            ],
            items3: [
            ],
            nowFloder: '',
            dialog: false,
            new_folder: '',
            de_folder: false,
            de_index: '',
            upload_modal: false,
            file: '',
            de_file: false
        }),
        components: {
            update
        },
        mounted() {
            this.getFolder()

        },
        methods: {
            async getFolder(folder = ''){
                this.items = [];
                this.items1 = [];
                this.items3 = [];
                this.items2 = [];
                let header = {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
                await this.$http.get('/api/file?folder=' + folder,  {headers: header}).then(res => {
                    let data = res.body.data;
                    console.log(data)
                    for (let i in data.breadcrumbs) {
                        this.items3.push({text: data.breadcrumbs[i]});
                    }
                    this.items3.push({text: data.folderName});
                    for (let i in data.subfolders) {
                        let name = data.subfolders[i];
                        this.items.push({icon: 'folder', iconClass: 'grey lighten-1 white--text', title: name})
                    }

                    data.files.forEach((val, index, ele) => {
                        this.items2.push({ icon: 'assignment', iconClass: 'blue white--text', title: val.name, subtitle: val.modifed })
                    })
                    this.nowFolder = data.folder;
                })

            },
            alter(folderIndex) {
                let folder = '';
                for (let i = 1; i <= folderIndex; i++) {
                    folder += this.items3[i].text + '/';
                }
                this.getFolder(folder);
            },
            changeFolder(folder) {
                let _folder;
                if (this.nowFolder == '/') {
                    _folder = this.nowFolder + folder;
                } else {
                    _folder = this.nowFolder + '/' + folder;
                }
                this.getFolder(_folder)
            },
            createFolder() {
                let  param = {
                    folder: this.nowFolder,
                    new_folder: this.new_folder
                }

                let header = {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }

                this.$http.post('/api/file/create', param, {headers:header}).then(res => {
                    console.log(res.body.data);
                    this.getFolder(this.nowFolder);
                    this.dialog = false;
                })
            },
            deleteFolder(){
                let param = {
                    del_folder: this.items[this.de_index].title,
                    folder: this.nowFolder
                };

                let header = {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }

                this.$http.post('/api/file/delete', param,  {headers: header}).then( res => {
                    console.log(res.body.data);
                    this.getFolder(this.nowFolder);
                    this.de_folder = false;

                })
            },
            de_modal(index) {
                this.de_folder = true;
                this.de_index = index;
            },
            de_fi(index) {
              this.de_file = true;
              this.de_index = index;
            },
            deleteFile() {
              let param = {
                  del_file: this.items2[this.de_index].title,
                  folder: this.nowFolder
              }


                let header = {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }

              this.$http.post('/api/file/deleteFile', param,  {headers: header}).then(res => {
                  console.log(res.body.data);
                  this.getFolder(this.nowFolder);
                  this.de_file = false
              })
            },
            change(e) {
                this.file = e.target.files[0];
            },
            upload() {
                if (this.file) {
                    const formData = new FormData();
                    formData.append('file', this.file);
                    formData.append('folder', this.nowFolder)


                    let header = {
                        'Accept': 'application/json',
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    }

                    this.$http.post('/api/file/upload', formData,  {headers: header}).then(res => {
                        this.getFolder(this.nowFolder);
                        this.upload_modal = false;
                    })
                }
            }

        }


    }
</script>