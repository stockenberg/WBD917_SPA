<template>
    <div>
        <h2>All Tasks</h2>
        <div class="row">
            <list></list>
        </div>
    </div>
</template>


<script>
import List from '@/components/tasklist/List.vue';

export default {
    components: {List}    

}
</script>
