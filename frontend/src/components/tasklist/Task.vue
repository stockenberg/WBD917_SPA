<template>
     <li class="collection-item avatar">
        <img :src="img" alt="" class="circle">
        <h4 class="">{{Math.random().toString(36).substring(Math.random(2,4))}}</h4>
        <p>First Line <br>
            Second Line
        </p>
        <a href="#!" class="secondary-content"><i class="material-icons">check</i></a>
    </li>
</template>

<script>
export default {
    data () {
        return {
            
        }
    }
}
</script>


<style scoped>
    h4{
        font-size: 2rem;
    }
    img{
        top: 5.3vh;
        height: 8vh !important;
        width: 8vh !important;
    }
    i.material-icons{
        font-size: 2.6rem;
    }
    a.secondary-content{
        top: 46px !important;
    }
</style>

