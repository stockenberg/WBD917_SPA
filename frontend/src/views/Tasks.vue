<template>
    <div>
        <h2>All Tasks</h2>
        <div class="row">
            <list></list>
        </div>
        <fab :actions="fabActions" @add="add()"></fab>
        <add-task></add-task>
    </div>
</template>


<script>
import List from '@/components/tasklist/List.vue';
import AddTask from '@/components/tasklist/AddTask.vue';
import Fab from 'vue-fab';


export default {
    data() {
        return {
           
            fabActions: [
              {
                  name: 'add',
                  icon: 'add'
              },
             
          ]
        }
    },
    components: {List, AddTask, Fab},

    methods: {
        add() {
            console.log('add');
            EventHub.$emit('openModal');
            
        },
       
    }

}
</script>

