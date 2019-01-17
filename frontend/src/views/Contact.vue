<template>
    <div>
        <h1>This is my contact page</h1>
        <div>
            <google-map height-prop="250" @customevent="listenToChildren">

            </google-map>
        </div>
        <div>
            <description>
                <h2 slot="headline">Hallo</h2>
                <p slot="pastfooter">Hallo Welt, test</p>
            </description>
        </div>
    </div>
</template>


<script>
import GoogleMap from '@/components/contact/GoogleMap.vue';
import Description from '@/components/contact/Description.vue';

export default {
    components: {GoogleMap, Description},
    methods: {
        listenToChildren(param) {
            console.log('nah.. i wanna sleep');
            console.log(param);
        }
    }
}
</script>

<style>


</style>


