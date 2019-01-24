<template>
    <sweet-modal ref="modal">
            <form action="">
                <div class="input-field">
                    <label for="">Title</label>
                    <input type="text" name="" v-model="task.title" id="task">
                </div>

                <div class="input-field">
                    <label for="">Description</label>
                    <textarea id="textarea1" class="materialize-textarea" v-model="task.description"></textarea>
                </div>

            
                <div class="input-field">
                    <input type="date" v-model="task.due">
                     
                </div>
                <h5>Wer bearbeitet die Aufgabe?</h5>
                 <div class="users">
                      <div class="users col">
                            <img 
                            v-for="user in userArr" 
                            :key="user.id" 
                            :src="user.img" 
                            alt=""
                            :class="{'circle': true, 'gray': inArray(user.id, task.users)}" @click="attachToTask(user.id)"  >
                    </div>
                </div>

                <button @click="saveTask(task)">Submit</button>
            </form>
        </sweet-modal>
</template>


<script>

export default {
    data () {
        return {
            task: {
                title: null,
                description: null,
                users: [],
                due: null
            },
            userArr: null
        }
    },
    mounted () {
        this.getUsers();
        console.log(this.users);
        EventHub.$on('openModal', () => {
            this.$refs.modal.open('tab1')
        })
    },
    components: {},
    methods: { 

        saveTask(task) {
            axios.post(API_URL + "/task", task)
            .then(res => {
                console.log(res);
                this.task =  {
                    title: null,
                    description: null,
                    users: [],
                    due: null
                };
                this.$refs.modal.close('tab1')
                EventHub.$emit('refreshTasks')
                this.$toasted.show(res.data.content);
            })
        },

         attachToTask(id) {
            console.log(id);
            // if not in array
            console.log(this.task.users);
            if(!this.inArray(id, this.task.users)){
                this.task.users.push(id);
            }else{
                this.task.users.splice(this.task.users.indexOf(id),1);
            }
        },

        inArray(id, arr) {
            for(let i = 0; i < arr.length; i++){
                if(id === arr[i]){
                    return true;
                }
            }
            return false;
        },

        getUsers() {
            axios.get(API_URL + "/users")
                .then(res => {
                    this.userArr = res.data;
                })
        }
    }

}
</script>


<style>

.gray{
    opacity: .5;
}
.circle{
    width: 50px !important;
    height: 50px !important;
}
</style>
