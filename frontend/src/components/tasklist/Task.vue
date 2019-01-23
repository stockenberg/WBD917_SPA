<template>
     <li class="collection-item avatar row">
        <div class="users col" v-if="task.users.length > 0">
            <img :src="user.img" v-for="(user,index) in task.users" alt="" class="circle" :key="index">
        </div>
        <div class="col">
            <h4 class="">{{task.title}}</h4>
            <p>{{task.description}} </p>
        </div>
        <div class="col">
            <a href="#!" class="secondary-content" @click="completeTask(task.id)">
                <i class="material-icons">check</i>
            </a>
            <a href="#!" class="secondary-content red-text" @click="deleteTask(task.id)">
                <i class="material-icons">delete</i>
            </a>
        </div>
    </li>
</template>

<script>
export default {
    data () {
        return {
            
        }
    },
    methods: {
        completeTask(id){
            axios.put(API_URL + '/task/' + id)
            .then(res => {
                if(res.status === 200){
                    this.$emit('refreshTasks');
                    this.$toasted.show(res.data.content);
                }
            })
        },
        deleteTask(id){
            axios.delete(API_URL + '/task/' + id)
            .then(res => {
                if(res.status === 200){
                    this.$emit('refreshTasks');
                    this.$toasted.show(res.data.content);
                }
            })
        },
    },
    props: ['task']
}
</script>


<style scoped>
    h4{
        font-size: 2rem;
    }
    .circle{
        position: static !important;
    }
    img{
        top: 4.3vh;
        height: 4vh !important;
        width: 4vh !important;
    }
    i.material-icons{
        font-size: 2.6rem;
    }
    .collection .collection-item.avatar .secondary-content{
        top: 46px;
        position: static;
    }
</style>

