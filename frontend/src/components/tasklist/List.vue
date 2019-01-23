<template>
      <ul class="collection col m8 offset-m2">
      
          <task v-for="task in tasks" 
          :key="task.id" :task="task"
          @refreshTasks="getAllTasks"
          ></task>
      
    </ul>
</template>

<script>
import Task from './Task.vue';

export default {
    data() {
        return {
            tasks: null
        }
    },
    mounted() {
        this.getAllTasks();
    },
    methods: {
        getAllTasks () {
            axios.get(API_URL + '/tasks')
            .then(res => {
                console.log(res.data);
                this.tasks = res.data;
            });
        }
    },
    components: {Task}
}
</script>

